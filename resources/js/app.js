require('./bootstrap');

import Alpine from 'alpinejs';
import algoliasearch from 'algoliasearch'
import markdownIt from 'markdown-it'
// import hljs from 'highlight.js'

window.Alpine = Alpine;
Alpine.start();

const client = algoliasearch('M7D0CT4NS4', '5fa6fbba9713d305a81cd784c14ce05f');
const index = client.initIndex('topics');

index.search('Eum').then(({ hits }) => {
    console.log(hits);
});

const hljs = require('highlight.js');

window.md = new markdownIt({
    html: false,
    xhtmlOut: false,
    breaks: true,
    langPrefix: 'language-',
    linkify: true,
    typographer: true,
    quotes: '“”<<>>‘’',
    highlight: function (str, lang) {
        if (lang && hljs.getLanguage(lang)) {
            try {
                return '<pre class="hljs p-6 rounded-md"><code>' +
                        hljs.highlight(str, { language: lang, ignoreIllegals: true }).value +
                        '</code></pre>';
            } catch (__) { }
        }
        return `<pre class="hljs"><code>` + md.utils.escapeHtml(str) + `</code></pre>`;
    }
})
