<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<? foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="post_section" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

        <span class="comment"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["SHOW_COUNTER"] ?: 0 ?></a></span>

        <h2><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h2>


        December 28, 2048 | <strong>Author:</strong> <?=$arItem["PROPERTIES"]["AUTHOR"]["VALUE"]?> | <strong>Category:</strong> <a href="#">Freebies</a>

        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="image 1" />

        <p><?=$arItem["PREVIEW_TEXT"]?></p>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Continue reading...</a>

    </div>

<?endforeach;?>
<?php if($arParams['DISPLAY_BOTTOM_PAGER']): ?>
    <?=$arResult['NAV_STRING'];?>
<?php endif;?>