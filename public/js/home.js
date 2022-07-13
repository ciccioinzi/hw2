function openCollection(event)
{
    const collection_id = event.currentTarget.dataset.collection_id;
    window.location.assign(BASE_URL + 'collections/view/' + collection_id);
}

function createCollectionItem(collection)
{
    const collection_div = document.createElement('div');
    collection_div.dataset.collection_id = collection.id;
    collection_div.classList.add('collection-item');
    collection_div.addEventListener('click', openCollection);
    const folder_img = document.createElement('img');
    folder_img.src = BASE_URL + "img/folder.png";
    collection_div.append(folder_img);
    const caption = document.createElement('span');
    caption.textContent = collection.name;
    collection_div.append(caption);
    return collection_div;
}

function updateCollections(data)
{
    console.log(data);
    const c_div = document.querySelector('#collections');
    c_div.innerHTML = '';
    if(data.length == 0)
    {
        c_div.textContent = 'Nessuna raccolta';
        return [];
    }
    for(collection of data)
    {
        c_div.append(createCollectionItem(collection));
    }
}

// Aggiungi raccolta
function onAddCollectionData(data)
{
    updateCollections(data);
}

function onAddCollectionResponse(response)
{
    return response.json();
}

function addCollection(event)
{
    const collection_name = document.querySelector('#add-collection-name').value;
    fetch(BASE_URL + 'collections/add/' + collection_name).then(onAddCollectionResponse).then(onAddCollectionData);
}

// Elenca raccolte (al caricamento)
function onListCollectionsData(data)
{
    updateCollections(data);
}

function onListCollectionsResponse(response)
{
    return response.json();
}

fetch(BASE_URL + 'collections/list').then(onListCollectionsResponse).then(onListCollectionsData);

// Eventi
document.querySelector('#add-collection-btn').addEventListener('click', addCollection);