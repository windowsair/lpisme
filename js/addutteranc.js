(function () {
    var utterances = document.createElement('script');
    utterances.type = 'text/javascript';
    utterances.async = true;
    utterances.setAttribute('issue-term', 'pathname')
    utterances.setAttribute('theme', 'github-light')
    utterances.setAttribute('repo', 'windowsair/blog-comment')
    utterances.crossorigin = 'anonymous';
    utterances.src = 'https://utteranc.es/client.js';
    if (document.getElementById('comments') &&
        document.getElementsByClassName('utterances').length == 0) {
        document.getElementById('comments').appendChild(utterances);
    }
})();