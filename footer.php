<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

	<div id="footer" class="cf">
		<div class="social-wrapper">
		<?php if ($this->options->socialgithub): ?>
			<a class="social github" target="blank" href="<?php $this->options->socialgithub(); ?>">
				<i class="icon icon-github"></i>
			</a>
		<?php endif; ?>
		<?php if ($this->options->socialgoogle): ?>
			<a class="social google-plus" target="blank" href="<?php $this->options->socialgoogle(); ?>">
				<i class="icon icon-google-plus"></i>
			</a>
		<?php endif; ?>
			<a class="social rss" target="blank" href="<?php $this->options->siteUrl(); ?>feed/">
				<i class="icon icon-rss"></i>
			</a>
		<?php if ($this->options->socialtwitter): ?>
			<a class="social twitter" target="blank" href="<?php $this->options->socialtwitter(); ?>">
				<i class="icon icon-twitter"></i>
			</a>
		<?php endif; ?>
		<?php if ($this->options->socialweibo): ?>
			<a class="social weibo" target="blank" href="<?php $this->options->socialweibo(); ?>">
				<i class="icon icon-weibo"></i>
			</a>
		<?php endif; ?>
		</div>
		<div>
			Theme is <span class="codename">Lpisme</span> by <a href="https://www.linpx.com" target="_blank">Chakhsu</a> / Powered by <a href="http://www.typecho.org" target="_blank">Typecho</a>
		</div>
		<div>
			&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
		</div>
	</div>
	
	
	<?php $this->footer(); ?>
	<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>" data-no-instant></script>

	<script src="<?php $this->options->themeUrl('js/functions.js'); ?>"></script>
	<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>

	<script src="//cdn.bootcss.com/fastclick/1.0.6/fastclick.min.js" data-no-instant></script>
	<script src="//cdn.bootcss.com/instantclick/3.0.1/instantclick.min.js" data-no-instant></script>
    <?php if($this->is('index')): ?>
    <script> var lists = document.getElementsByTagName("link");
    for (var i = 0; i < lists.length; i++) {
    if (lists[i].getAttribute("href").indexOf("passage.css") != -1) {
    lists[i].setAttribute("href","<?php $this->options->themeUrl('style.css'); ?>");
}
    </script>
	<?php else: ?>
	
	<script src="<?php $this->options->themeUrl('js/prism.js'); ?>" ></script>
	<script src="<?php $this->options->themeUrl('js/prism-toolbar.js'); ?>" ></script>    
    <script src="<?php $this->options->themeUrl('js/prism-copy-to-clipboard.js'); ?>" ></script>
	<div id="directory-content" class="directory-content"><div id="directory"></div></div>
	<script>var aLi = document.getElementsByTagName("pre");

	var i = 0;
	for (i = 0; i < aLi.length; i++) {

		aLi[i].className += ' line-numbers';


	}
	var postDirectoryBuild = function() {
    var postChildren = function children(childNodes, reg) {
        var result = [],
            isReg = typeof reg === 'object',
            isStr = typeof reg === 'string',
            node, i, len;
        for (i = 0, len = childNodes.length; i < len; i++) {
            node = childNodes[i];
            if ((node.nodeType === 1 || node.nodeType === 9) &&
                (!reg ||
                isReg && reg.test(node.tagName.toLowerCase()) ||
                isStr && node.tagName.toLowerCase() === reg)) {
                result.push(node);
            }
        }
        return result;
    },
    createPostDirectory = function(article, directory, isDirNum) {
        var contentArr = [],
            titleId = [],
            levelArr, root, level,
            currentList, list, li, link, i, len;
        levelArr = (function(article, contentArr, titleId) {
            var titleElem = postChildren(article.childNodes, /^h\d$/),
                levelArr = [],
                lastNum = 1,
                lastRevNum = 1,
                count = 0,
                guid = 1,
                id = 'directory' + (Math.random() + '').replace(/\D/, ''),
                lastRevNum, num, elem;
            while (titleElem.length) {
                elem = titleElem.shift();
                contentArr.push(elem.innerHTML);
                num = +elem.tagName.match(/\d/)[0];
                if (num > lastNum) {
                    levelArr.push(1);
                    lastRevNum += 1;
                } else if (num === lastRevNum ||
                    num > lastRevNum && num <= lastNum) {
                    levelArr.push(0);
                    lastRevNum = lastRevNum;
                } else if (num < lastRevNum) {
                    levelArr.push(num - lastRevNum);
                    lastRevNum = num;
                }
                count += levelArr[levelArr.length - 1];
                lastNum = num;
                elem.id = elem.id || (id + guid++);
                titleId.push(elem.id);
            }
            if (count !== 0 && levelArr[0] === 1) levelArr[0] = 0;

            return levelArr;
        })(article, contentArr, titleId);
        currentList = root = document.createElement('ul');
        dirNum = [0];
        for (i = 0, len = levelArr.length; i < len; i++) {
            level = levelArr[i];
            if (level === 1) {
                list = document.createElement('ul');
                if (!currentList.lastElementChild) {
                    currentList.appendChild(document.createElement('li'));
                }
                currentList.lastElementChild.appendChild(list);
                currentList = list;
                dirNum.push(0);
            } else if (level < 0) {
                level *= 2;
                while (level++) {
                    if (level % 2) dirNum.pop();
                    currentList = currentList.parentNode;
                }
            }
            dirNum[dirNum.length - 1]++;
            li = document.createElement('li');
            link = document.createElement('a');
            link.href = '#' + titleId[i];
            link.innerHTML = !isDirNum ? contentArr[i] :
                dirNum.join('.') + ' ' + contentArr[i] ;
            li.appendChild(link);
            currentList.appendChild(li);
        }
        document.getElementById('directory').appendChild(root);
    };
    createPostDirectory(document.getElementsByClassName('post-content cf')[0],document.getElementById('directory'), true);
};
postDirectoryBuild();
	</script>
    <script src="<?php $this->options->themeUrl('js/clipboard.min.js'); ?>" ></script>
	<script src="<?php $this->options->themeUrl('js/prism-line-numbers.js'); ?>" ></script>
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>
	<script src="<?php $this->options->themeUrl('js/addimg.js'); ?>" ></script>
	<script src="<?php $this->options->themeUrl('js/photoswipe.js'); ?>" ></script>
	<script src="<?php $this->options->themeUrl('js/photoswipe-ui-default.js'); ?>" ></script>
	<?php endif; ?>

	<?php if($this->options->GoogleAnalytics): ?>
	<script>
	<?php $this->options->GoogleAnalytics(); ?>
	</script>
	<?php endif; ?>
	<script data-no-instant>
	InstantClick.on('change', function(isInitialLoad) {
		if (isInitialLoad === false) {
			if (typeof Prism !== 'undefined') Prism.highlightAll(true,null);
			<?php if($this->options->GoogleAnalytics): ?>
			if (typeof ga !== 'undefined') ga('send', 'pageview', location.pathname + location.search);
			<?php endif; ?>
		}
	});
	InstantClick.init();
	</script>
	<?php else : ?>

	<script src="//cdn.bootcss.com/fastclick/1.0.6/fastclick.min.js"></script>
	
	<script src="<?php $this->options->themeUrl('js/prism.js'); ?>" ></script>
 
	<?php endif; ?>

	</body>
</html>