// добавляем через # блоки по ID без дат
preg_match_all('/#NODATE_CARD_(.*?)#/', $arResult['DETAIL_TEXT'], $elements_nodate, PREG_PATTERN_ORDER);
if ($elements_nodate[1]) {
    $arFilter = array("IBLOCK_ID", 'ID');
    $res = CIBlockElement::GetList(Array(), array('ACTIVE' => 'Y', 'ID' => $elements_nodate[1]), false, false);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields() + $ob->GetProperties();
        $arResult['ALL_ITEMS'][$arFields['ID']] = $arFields;
    }

    foreach ($elements_nodate[1] as $element) {
        $allItems = '';
        if ($arResult['ALL_ITEMS'][$element]) {
            $allItems = '
            <a class="card card--line" href="' . $arResult['ALL_ITEMS'][$element]['DETAIL_PAGE_URL'] . '">
                <button class="like jsLike" type="button" data-id="' . $arResult['ALL_ITEMS'][$element]['ID'] . '">
                    <svg class="icon like__icon">
                        <use xlink:href="#like"></use>
                    </svg>
                </button>
                <picture class="card__img"><img src="' . CFile::GetPath($arResult['ALL_ITEMS'][$element]['PREVIEW_PICTURE']) . '" alt="' . $arResult['ALL_ITEMS'][$element]['NAME'] . '" /></picture>
				<div class="card__inner">
				  <div class="card__labels-wrapper">';
					if($arResult['ALL_ITEMS'][$element]['ALL_HASHTAG']['VALUE']):
					  $allItems .='<div class="card__labels">';
					  foreach($arResult['ALL_ITEMS'][$element]['ALL_HASHTAG']['VALUE'] as $hashtag):
						$hashtagData = CIBlockElement::GetList(array(),array('IBLOCK_ID'=>IBLOCK_TAGS_ID,'ID'=>$hashtag),false,false,array('ID','NAME'));
						if($hashtagResult = $hashtagData->GetNext()){
							$allItems .='<div class="card__label"><span>'.$hashtagResult['NAME'].'</span></div>';
						}
					  endforeach;
					  $allItems .='</div>';
					endif;
				  $allItems .='<div class="card__date"></div>
				  </div>
				  <h4 class="card__title">'.$arResult['ALL_ITEMS'][$element]['NAME'].'</h4>
				  <p class="card__text">'.$arResult['ALL_ITEMS'][$element]['PREVIEW_TEXT'].'</p>
				  </div>
            </a>';
        }
        $arResult['DETAIL_TEXT'] = str_replace('#NODATE_CARD_' . $element . '#', $allItems, $arResult['DETAIL_TEXT']);
    }
}