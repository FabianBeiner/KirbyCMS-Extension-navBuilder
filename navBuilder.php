<?php
/**
 * navBuilder.php for Kirb CMS.
 * Written by Fabian Beiner
 *
 * And yes, I'm a sucker for beautiful HTML output. :)
 */
if (!function_exists('navBuilder')) {
    function navBuilder($aNav, $iMaxLevel = NULL, $iSub = NULL) {
        $sAttrUl = ($iSub) ? ' class="is-child"' : '';
        $sMenu   = (is_null($iSub)) ? PHP_EOL : '';
        $sMenu  .= '<ul' . $sAttrUl . '>' . PHP_EOL;

        foreach ($aNav as $aPage) {
            $sSub = NULL;

            if ($aPage->hasChildren() && (is_null($iMaxLevel) || ($aPage->depth() < $iMaxLevel))) {
                $sSub = navBuilder($aPage->children(), $iMaxLevel, $aPage->depth());
            }

            $sAttrA    = ($aPage->isActive()) ? ' class="active"' : '';
            $sClassLi  = 'nav-level-' . $aPage->depth();
            $sClassLi .= (is_null($sSub)) ? '' : ' has-sub';
            $sTabs     = str_repeat("\t", $aPage->depth() + $iSub);

            if ($sSub) {
                $sMenu .= $sTabs . '<li class="' . $sClassLi . '">' . PHP_EOL . $sTabs . "\t" . '<a href="' . $aPage->url() . '"' . $sAttrA . '>' . html($aPage->title()) . '</a>' . PHP_EOL;
                $sMenu .= $sTabs . "\t" . $sSub . PHP_EOL;
                $sMenu .= $sTabs . '</li>' . PHP_EOL;
            }
            else {
                $sMenu .= $sTabs . '<li class="' . $sClassLi . '"><a href="' . $aPage->url() . '"' . $sAttrA . '>' . html($aPage->title()) . '</a></li>' . PHP_EOL;
            }
        }

        $sTabs  = str_repeat("\t", $aPage->depth() + (($aPage->depth() > 2) ? $aPage->depth() - 2 : 0));
        $sTabs  = (is_null($iSub)) ? '' : $sTabs;
        $sMenu .= $sTabs . '</ul>';
        $sMenu .= (is_null($iSub)) ? PHP_EOL : '';

        return $sMenu;
    }
}

// Is there an entry point given? If not, fallback to “all visible pages”.
if (!isset($entryPoint)) {
    $entryPoint = $site->pages()->visible();
}
elseif (isset($entryPoint) && is_string($entryPoint)) {
    if ($pages->find($entryPoint) && count($pages->find($entryPoint)->children())) {
        $entryPoint = $pages->find($entryPoint)->children();
    }
    else {
        $entryPoint = $site->pages()->visible();
    }
}

// Is there a maximum level set?
if (!isset($maxLevel) || (isset($maxLevel) && $maxLevel == 0)) {
    $maxLevel = NULL;
}

// Call the function and echo the HTML. :)
echo navBuilder($entryPoint, $maxLevel);
