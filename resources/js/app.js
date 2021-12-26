require('./bootstrap');

import Alpine from 'alpinejs';
import hljs from 'highlight.js';
import markdownIt from 'markdown-it';

window.Alpine = Alpine;

Alpine.start();

window.md = new markdownIt({
	html:         false,        // Enable HTML tags in source
	xhtmlOut:     false,        // Use '/' to close single tags (<br />).
								// This is only for full CommonMark compatibility.
	breaks:       true,        // Convert '\n' in paragraphs into <br>
	langPrefix:   'language-',  // CSS language prefix for fenced blocks. Can be
								// useful for external highlighters.
	linkify:      true,        // Autoconvert URL-like text to links
  
	// Enable some language-neutral replacement + quotes beautification
	// For the full list of replacements, see https://github.com/markdown-it/markdown-it/blob/master/lib/rules_core/replacements.js
	typographer:  true,
  
	// Double + single quotes replacement pairs, when typographer enabled,
	// and smartquotes on. Could be either a String or an Array.
	//
	// For example, you can use '«»„“' for Russian, '„“‚‘' for German,
	// and ['«\xA0', '\xA0»', '‹\xA0', '\xA0›'] for French (including nbsp).
	quotes: '“”<<>>‘’',
  
	// Highlighter function. Should return escaped HTML,
	// or '' if the source string is not changed and should be escaped externally.
	// If result starts with <pre... internal wrapper is skipped.
	highlight: function (str, lang) {
		if (lang && hljs.getLanguage(lang)) {
		  try {
			return `<pre><code class="hljs ${lang} p-2 rounded-md">` +
				   hljs.highlightAuto(str, { language: lang, ignoreIllegals: true }).value +
				   `</code></pre>`;
		  } catch (__) {}
		}
		return `<pre class="hljs"><code>` + md.utils.escapeHtml(str) + `</code></pre>`;
	}
});
