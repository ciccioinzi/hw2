function onSongData(data)
{
    updateSongs(data);
}

function onSongResponse(response)
{
    return response.json();
}

function addSong(event)
{
    const artist = event.currentTarget.dataset.artist;
    const title = event.currentTarget.dataset.title;
    const image = event.currentTarget.dataset.image;
    const form_data = new FormData();
    form_data.append('artist', artist);
    form_data.append('title', title);
    form_data.append('image', image);
    form_data.append('_token', csrf_token);
    fetch(BASE_URL + 'collections/add-song/' + collection_id, {method: 'post', body: form_data}).then(onSongResponse).then(onSongData);
}

function removeSong(event)
{
    const song_id = event.currentTarget.dataset.song_id;
    fetch(BASE_URL + 'collections/remove-song/' + song_id).then(onSongResponse).then(onSongData);
}

function createSongItem(song, clickable, removable)
{
    const song_div = document.createElement('div');
    song_div.dataset.artist = song.artist;
    song_div.dataset.title = song.title;
    song_div.dataset.image = song.image;
    song_div.classList.add('song-item');
    const song_img = document.createElement('img');
    song_img.src = song.image;
    song_div.append(song_img);
    const artist = document.createElement('span');
    artist.classList.add('artist');
    artist.textContent = song.artist;
    song_div.append(artist);
    const title = document.createElement('span');
    title.classList.add('title');
    title.textContent = song.title;
    song_div.append(title);
    if(clickable)
    {
        song_div.classList.add('clickable');
        song_div.addEventListener('click', addSong);
    }
    if(removable)
    {
        const remove_img = document.createElement('img');
        remove_img.src = BASE_URL + 'img/x.png';
        remove_img.classList.add('remove-btn');
        remove_img.classList.add('clickable');
        remove_img.dataset.song_id = song.id;
        remove_img.addEventListener('click', removeSong);
        song_div.append(remove_img);
    }
    return song_div;
}

function updateSongs(data)
{
    const s_div = document.querySelector('#songs');
    s_div.innerHTML = '';
    if(data.length == 0)
    {
        s_div.textContent = 'Nessuna canzone';
        return;
    }
    for(song of data)
    {
        s_div.append(createSongItem(song, false, true));
    }
}

// Aggiungi raccolta
function onSearchData(data)
{
    const s_div = document.querySelector('#search_result');
    s_div.innerHTML = '';
    if(data.length == 0)
    {
        s_div.textContent = 'Nessuna canzone trovata';
        return;
    }
    for(song of data)
    {
        s_div.append(createSongItem(song, true, false));
    }
}

function onSearchResponse(response)
{
    return response.json();
}

function search(event)
{
    const search_text = document.querySelector('#search-text').value;
    fetch(BASE_URL + 'collections/search/' + search_text).then(onSearchResponse).then(onSearchData);
}

// Elenca canzoni (al caricamento)
function onCollectionContentData(data)
{
    updateSongs(data);
}

function onCollectionContentResponse(response)
{
    return response.json();
}

fetch(BASE_URL + 'collections/content/' + collection_id).then(onCollectionContentResponse).then(onCollectionContentData);

// Eventi
document.querySelector('#search-btn').addEventListener('click', search);