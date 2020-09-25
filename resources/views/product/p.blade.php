@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/dashkit/css/product/cate.css">
<link rel="stylesheet" type="text/css" href="/assets/dashkit/css/product/cate2.css">

<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="com-struct category-page-wrap">
                    <!-- notice -->
                    <div class="com-struct category-page-notice" id="struct-notice">
                        <div class="sell-feedback-message">
                            <div role="alert" content="<font color=red>111，11111。</font>" class="next-message next-message-prompt next-inline next-medium next-only-content">
                                <i class="next-icon next-medium next-message-symbol next-message-symbol-icon">
                                </i>
                                <div class="next-message-content">
                                    <div class="sell-feedback-content">
                                        <div>
                                            <font color="red">
                                                xss ddd。
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- search -->
                    <div class="com-struct" id="struct-search">
                        <div class="category-search-wrap l-category-search">
                            <span class="next-select next-select-auto-complete next-size-medium category-search" aria-haspopup="true">
                                <span class="next-input next-medium">
                                    <input role="combobox" aria-autocomplete="list" aria-disabled="false" placeholder="类目搜索：可输入产品名称" height="100%" autocomplete="off" value="">
                                </span>
                            </span>
                            <button type="button" class="next-btn next-medium next-btn-normal search-btn" role="button">
                                搜索
                            </button>
                        </div>
                    </div>

                    <!-- category-history -->
                    <div class="com-struct" id="struct-categoryHistory">
                        <div class="category-history category-history-wrap">
                            <span class="label">
                                发布历史:
                            </span>
                            <div class="next-tabs next-tabs-text next-small history-list" excssmode="slide">
                                <div role="tablist" class="next-tabs-bar" tabindex="0">
                                    <div class="next-tabs-nav-container">
                                        <div class="next-tabs-nav-wrap">
                                            <div class="next-tabs-nav-scroll">
                                                <div class="next-tabs-nav">
                                                    <div role="tab" aria-disabled="false" aria-selected="false" class="next-tabs-tab">
                                                        <div class="next-tabs-tab-inner">
                                                            电子烟
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="next-tabs-content">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- category-select -->
                    <div class="com-struct" id="struct-categorySelect">
                        <div class="next-loading next-loading-inline sell-o-category-selection sell-category-selection-container block category-select">
                            <div class="next-loading-wrap">
                                <div class="cascade-selection category-lists-wrap" style="max-width: 946px;">
                                    <div class="next-loading next-loading-inline" style="height: 100%; width: 236px; margin-left: 0px;">
                                        <div class="next-loading-wrap">
                                            <div class="category-list">
                                                <div class="search-wrap">
                                                    <span class="next-input next-medium search-input">
                                                        <input placeholder="名称/拼音首字母" height="100%" autocomplete="off" value="">
                                                    </span>
                                                    <i class="next-icon next-icon-search next-small search-icon">
                                                    </i>
                                                </div>
                                                <div class="list-frame">
                                                    <ul class="group-wrap">
                                                        <li class="group-item">
                                                            <div class="group-title">
                                                                <span>
                                                                    游戏话费
                                                                </span>
                                                                <i class="next-icon next-icon-arrow-down next-xs">
                                                                </i>
                                                            </div>
                                                            <div style="display: block;">
                                                                <ul class="list-wrap">
                                                                    <li class="category-item" title="腾讯QQ专区">
                                                                        <div class="pre-item">
                                                                        </div>
                                                                        <p class="text">
                                                                            腾讯QQ专区
                                                                        </p>
                                                                        <span class="icon-wrap">
                                                                            <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                            </i>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="group-item">
                                                            <div class="group-title">
                                                                <span>
                                                                    服装鞋包
                                                                </span>
                                                                <i class="next-icon next-icon-arrow-down next-xs">
                                                                </i>
                                                            </div>
                                                            <div style="display: block;">
                                                                <ul class="list-wrap">
                                                                    <li class="category-item" title="服饰配件/皮带/帽子/围巾">
                                                                        <div class="pre-item">
                                                                        </div>
                                                                        <p class="text">
                                                                            服饰配件/皮带/帽子/围巾
                                                                        </p>
                                                                        <span class="icon-wrap">
                                                                            <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                            </i>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="group-item">
                                                            <div class="group-title">
                                                                <span>
                                                                    汽配摩托
                                                                </span>
                                                                <i class="next-icon next-icon-arrow-down next-xs">
                                                                </i>
                                                            </div>
                                                            <div style="display: block;">
                                                                <ul class="list-wrap">
                                                                    <li class="category-item" title="摩托车/装备/配件">
                                                                        <div class="pre-item">
                                                                        </div>
                                                                        <p class="text">
                                                                            摩托车/装备/配件
                                                                        </p>
                                                                        <span class="icon-wrap">
                                                                            <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                            </i>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="list-info">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="next-loading next-loading-inline" style="height: 100%; width: 236px; margin-left: 0px;">
                                        <div class="next-loading-wrap">
                                            <div class="category-list">
                                                <div class="search-wrap">
                                                    <span class="next-input next-medium search-input">
                                                        <input placeholder="名称/拼音首字母" height="100%" autocomplete="off" value="">
                                                    </span>
                                                    <i class="next-icon next-icon-search next-small search-icon">
                                                    </i>
                                                </div>
                                                <div class="list-frame">
                                                    <ul class="group-wrap">
                                                        <li class="category-item" title="滴眼液、护眼用品">
                                                            <div class="pre-item">
                                                            </div>
                                                            <p class="text">
                                                                滴眼液、护眼用品
                                                            </p>
                                                            <span class="icon-wrap">
                                                                <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                </i>
                                                            </span>
                                                        </li>
                                                        <li class="category-item" title="眼镜配件、护理剂">
                                                            <div class="pre-item">
                                                            </div>
                                                            <p class="text">
                                                                眼镜配件、护理剂
                                                            </p>
                                                            <span class="icon-wrap">
                                                                <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                </i>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <div class="list-info">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="next-loading next-loading-inline" style="height: 100%; width: 236px; margin-left: 0px;">
                                        <div class="next-loading-wrap">
                                            <div class="category-list">
                                                <div class="search-wrap">
                                                    <span class="next-input next-medium search-input">
                                                        <input placeholder="名称/拼音首字母" height="100%" autocomplete="off" value="">
                                                    </span>
                                                    <i class="next-icon next-icon-search next-small search-icon">
                                                    </i>
                                                </div>
                                                <div class="list-frame">
                                                    <ul class="group-wrap">
                                                        <li class="category-item" title="鼻烟">
                                                            <div class="pre-item">
                                                            </div>
                                                            <p class="text">
                                                                鼻烟
                                                            </p>
                                                            <span class="icon-wrap">
                                                                <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                </i>
                                                            </span>
                                                        </li>
                                                        <li class="category-item" title="茶烟">
                                                            <div class="pre-item">
                                                            </div>
                                                            <p class="text">
                                                                茶烟
                                                            </p>
                                                            <span class="icon-wrap">
                                                                <i class="next-icon next-icon-arrow-right next-xs leaf-icon">
                                                                </i>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <div class="list-info">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="next-loading next-loading-inline" style="height: 100%; width: 236px; margin-left: 0px;">
                                        <div class="next-loading-wrap">
                                            <div class="category-list">
                                                <div class="search-wrap">
                                                    <span class="next-input next-medium search-input">
                                                        <input placeholder="名称/拼音首字母" height="100%" autocomplete="off" value="">
                                                    </span>
                                                    <i class="next-icon next-icon-search next-small search-icon">
                                                    </i>
                                                </div>
                                                <div class="list-frame">
                                                    <ul class="group-wrap">
                                                        <li class="category-item" title="JOYETECH">
                                                            <div class="pre-item">
                                                            </div>
                                                            <p class="text">
                                                                JOYETECH
                                                            </p>
                                                            <span class="icon-wrap">
                                                            </span>
                                                        </li>
                                                        <li class="category-item" title="JUKONG/久康">
                                                            <div class="pre-item">
                                                            </div>
                                                            <p class="text">
                                                                JUKONG/久康
                                                            </p>
                                                            <span class="icon-wrap">
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <div class="list-info">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div dir="ltr" role="row" class="next-row next-row-wrap sell-catProp hide">
                            <div dir="ltr" role="gridcell" class="next-col next-col-12 left-items">
                            </div>
                            <div dir="ltr" role="gridcell" class="next-col next-col-12 right-items">
                            </div>
                            <div dir="ltr" role="gridcell" class="next-col next-col-24 exclude-items">
                            </div>
                        </div>
                    </div>

                    <!-- category-path -->
                    <div class="com-struct" id="struct-categoryPath">
                        <div class="category-path-wrap category-path">
                            <div class="path-info-wrap">
                                <div class="path-list">
                                    <span class="path-label">
                                        已选类目:
                                    </span>
                                    <button type="button" class="next-btn next-medium next-btn-primary next-btn-text path-node" role="button">
                                        ZIPPO/瑞士军刀/眼镜
                                    </button>
                                    <span class="connector-char">
                                        &gt;
                                    </span>
                                    <button type="button" class="next-btn next-medium next-btn-primary next-btn-text path-node" role="button">
                                        替烟产品
                                    </button>
                                    <span class="connector-char">
                                        &gt;
                                    </span>
                                    <button type="button" class="next-btn next-medium next-btn-primary next-btn-text path-node" role="button">
                                        鼻烟
                                    </button>
                                </div>
                                <div class="path-tips">
                                </div>
                            </div>
                            <div class="path-help">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection