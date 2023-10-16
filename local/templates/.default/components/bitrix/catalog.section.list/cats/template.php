<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h4>Categories</h4>
<ul class="templatemo_list">
    <?php foreach ($arResult['SECTIONS'] as &$arSection): ?>
        <?php $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction ($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arsectionDeleteParams);?>
        <li id="<? echo $this->GetEditAreaId ($arSection['ID']); ?>"><a href="<?=$arSection ['SECTION_PAGE_URL']; ?>" target="_parent"><?=$arSection['NAME'];?> (<?=$arSection['ELEMENT_CNT']?>)</a></li>
    <?endforeach;?>
    <?unset($arSection);?>
</ul>
<?php if($arParams['DISPLAY_BOTTOM_PAGER']): ?>
    <?=$arResult['NAV_STRING'];?>
<?php endif;?>