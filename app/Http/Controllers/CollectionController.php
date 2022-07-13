<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Collection;
use App\Models\Song;

class CollectionController extends BaseController
{
    public function home()
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        //leggiamo username
        $user = User::find(Session::get('user_id'));
        return view('home')->with('username', $user->username);
    }

    public function list()
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return [];
        }
        //Leggiamo le collection
        $user = User::find(Session::get('user_id'));
        return $user->collections;
    }

    public function add($name)
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return [];
        }
        //Creiamo nuova collection
        $collection = new Collection;
        $collection->user_id = Session::get('user_id');
        $collection->name = $name;
        $collection->save();
        //Restituisco le collection attuali
        return $collection->user->collections;
    }

    public function view($collection_id)
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        //Controllo permessi
        $collection = Collection::find($collection_id);
        if($collection->user_id != Session::get('user_id'))
        {
            return redirect('home');
        }
        //Mostriamo la view
        return view('collection')->with('collection', $collection);
    }

    public function content($collection_id)
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        //Controllo permessi
        $collection = Collection::find($collection_id);
        if($collection->user_id != Session::get('user_id'))
        {
            return redirect('home');
        }
        //Restituiamo le canzoni
        return $collection->songs;
    }

    public function remove_song($song_id)
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        //Controllo permessi
        $song = Song::find($song_id);
        $collection = $song->collection;
        if($song->collection->user_id != Session::get('user_id'))
        {
            return [];
        }
        //Rimuovo la canzone
        $song->delete();
        //Restituiamo le canzoni
        return $collection->songs;
    }

    public function search($search)
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        //Ricerca Spotify
        $client_id = env('SPOTIFY_CLIENT_ID');
        $client_secret = env('SPOTIFY_CLIENT_SECRET');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $token = json_decode($result)->access_token;
        // Utilizzo
        $data = http_build_query(array("q" => $search, "type" => "track"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $songs = json_decode($result)->tracks->items;
        for($i=0; $i<min([count($songs), 20]); $i++)
        {
            $songs[$i] = ['artist' => $songs[$i]->artists[0]->name,
                            'title' => $songs[$i]->name,
                            'image' => $songs[$i]->album->images[0]->url
                            ];
        }
        return $songs;
    }

    public function add_song($collection_id)
    {
        //Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        //Controllo permessi
        $collection = Collection::find($collection_id);
        if($collection->user_id != Session::get('user_id'))
        {
            return redirect('home');
        }
        //Creo una canzone
        $song = new Song;
        $song->collection_id = $collection_id;
        $song->artist = request('artist');
        $song->title = request('title');
        $song->image = request('image');
        $song->save();
        //Restituiamo la lista di canzoni
        return $song->collection->songs;
    }

}

