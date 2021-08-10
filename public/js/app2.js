// Replace with your own values
const searchClient = algoliasearch(
    'F7SE8CDSWX',
    '36f1c4f0973318a920226ae534de4b21' // search only API key, not admin API key
);

const search = instantsearch({
    indexName: 'users',
    searchClient,
    routing: true,
});

const search2 = instantsearch({
    indexName: 'comments',
    searchClient,
    routing: true,
});

const search3 = instantsearch({
    indexName: 'posts',
    searchClient,
    routing: true,
});

search.addWidgets([
    instantsearch.widgets.configure({
        hitsPerPage: 10,
    }),
    instantsearch.widgets.searchBox({
        container: '#keyword',
        placeholder: 'Search for users',
    })
]);

search2.addWidgets([
    instantsearch.widgets.configure({
        hitsPerPage: 10,
    }),
    instantsearch.widgets.searchBox({
        container: '#keyword',
        placeholder: 'Search for comments',
    })
]);


search3.addWidgets([
    instantsearch.widgets.configure({
        hitsPerPage: 10,
    }),

    instantsearch.widgets.searchBox({
        container: '#keyword',
        placeholder: 'Search for posts',
    })

]);


search.addWidgets([
    instantsearch.widgets.hits({
        container: '#hits',
        templates: {
            item: document.getElementById('hit-template').innerHTML,
            empty: `We didn't find any results for the search <em>"{{query}}"</em>`,
        },
    })

]);

search.start();


search2.addWidgets([
    instantsearch.widgets.hits({
        container: '#hits',
        templates: {
            item: document.getElementById('hit-template').innerHTML,
            empty: `We didn't find any results for the search <em>"{{query}}"</em>`,
        },
    })
]);

search2.start();



search3.addWidgets([
    instantsearch.widgets.hits({
        container: '#hits',
        templates: {
            item: document.getElementById('hit-template').innerHTML,
            empty: `We didn't find any results for the search <em>"{{query}}"</em>`,
        },
    })
]);

search3.start();
