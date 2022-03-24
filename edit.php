<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Selamat Idul Fitri | Mohon Maaf Lahir & Batin</title>
        <style type="text/css">[ng-cloak]#splash{display:block!important}[ng-cloak]{display:none}#splash{display:none;position:absolute;top:45%;left:50%;width:6em;height:6em;overflow:hidden;border-radius:100%;z-index:0}@-webkit-keyframes fade{from{opacity:1}to{opacity:.2}}@keyframes fade{from{opacity:1}to{opacity:.2}}@-webkit-keyframes rotate{from{-webkit-transform:rotate(0deg)}to{-webkit-transform:rotate(360deg)}}@keyframes rotate{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}#splash::after,#splash::before{content:'';position:absolute;top:0;left:0;width:100%;height:100%}#splash::before{background:linear-gradient(to right,green,#ff0);-webkit-animation:rotate 2.5s linear infinite;animation:rotate 2.5s linear infinite}#splash::after{background:linear-gradient(to bottom,red,#00f);-webkit-animation:fade 2s infinite alternate,rotate 2.5s linear reverse infinite;animation:fade 2s infinite alternate,rotate 2.5s linear reverse infinite}#splash-spinner{position:absolute;width:100%;height:100%;z-index:1;border-radius:100%;box-sizing:border-box;border-left:.5em solid transparent;border-right:.5em solid transparent;border-bottom:.5em solid rgba(255,255,255,.3);border-top:.5em solid rgba(255,255,255,.3);-webkit-animation:rotate .8s linear infinite;animation:rotate .8s linear infinite}</style>
        <link rel="stylesheet" href="assets/css/main.css?v23">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
    </head>

    <body id="editor" ng-app="ImageEditor" ng-strict-di>

        <div id="splash" ng-cloak>
          <div id="splash-spinner"></div>
        </div>

        <div ng-controller="MainController" ng-cloak style="height: 100%">
            <section id="right-panels">
                <section id="objects" class="md-whiteframe-z1" ng-controller="ObjectsPanelController">
                    <h3 ed-toggle-panel-visibility="objects"><span>Layers</span><i class="mdi mdi-expand-less"></i></h3>
                    <div class="scrollbar-wrapper" ed-pretty-scrollbar ed-scroll-axis="y">
                        <ul class="objects-panel list-unstyled" ui-sortable="sortableOptions" ng-model="objects">
                            <li class="object panel-item" ng-repeat="object in objects" ng-click="setAsActive(object)" ng-if="!object.ignore">
                                <i class="mdi mdi-remove-red-eye toggle-visibility" ng-class="{ 'not-visible': !object.visible }" ng-click="toggleVisibility(object); $event.stopPropagation();"></i>
                                <i class="mdi mdi-delete delete-object" ng-click="deleteObject(object); $event.stopPropagation();"></i>
                                <i class="mdi mdi-lock-outline lock-object" ng-class="{ 'not-locked': !object.locked }" ng-click="toggleLock(object); $event.stopPropagation();"></i>
                                {{ spacify(object.name) || spacify(object.type) }}
                            </li>
                            <li ng-if="!canvas.fabric._objects.length" class="text-center"><h4>No layers yet.</h4></li>
                        </ul>
                    </div>
                </section>

                <section id="history" class="md-whiteframe-z1 panel-hidden">
                    <h3 ed-toggle-panel-visibility="history"><span>History</span><i class="mdi mdi-expand-less"></i></h3>
                    <ul class="history-panel list-unstyled" ed-pretty-scrollbar ed-scroll-axis="y">
                        <li class="history-item panel-item" ng-click="history.load(item)" ng-repeat="item in history.all">
                            <i class="mdi mdi-{{ item.icon }} main-icon"></i>
                            {{ spacify(item.name) }}
                        </li>
                        <li ng-if="history.all.length === 0" class="text-center"><h4>No history items yet.</h4></li>
                    </ul>
                </section>
            </section>

            <section ng-hide="!loading" id="spinner">
                <md-progress-circular class="md-spinner" md-diameter="100" md-mode="indeterminate"></md-progress-circular>
            </section>

            <section id="left-sidebar" ed-tabs="basics" class="md-whiteframe-z1">
                <div id="sidebar-toggler" ed-toggle-sidebar>
                    <md-button class="md-fab md-primary" aria-label="Toggle Sidebar">
                        <i class="mdi mdi-edit show-icon"></i>
                        <i class="mdi mdi-close close-icon"></i>
                    </md-button>
                </div>
                <div id="navigation-bar">
                    <div data-activates="basics" class="nav-item">
                        <i class="mdi mdi-image"></i>
                        <div class="title">BASICS</div>
                    </div>
                    <div data-activates="text" class="nav-item">
                        <i class="mdi mdi-format-bold"></i>
                        <div class="title pull-up">TEXT</div>
                    </div>
                    <div data-activates="drawing" class="nav-item">
                        <i class="mdi mdi-brush"></i>
                        <div class="title">DRAWING</div>
                    </div>
                    <div data-activates="filters" class="nav-item">
                        <i class="mdi mdi-brightness-6"></i>
                        <div class="title">FILTERS</div>
                    </div>
                    <div data-activates="simple-shapes" class="nav-item">
                        <i class="mdi mdi-panorama-vertical"></i>
                        <div class="title">SHAPES</div>
                    </div>
                    <div data-activates="stickers" class="nav-item">
                        <i class="mdi mdi-favorite"></i>
                        <div class="title pull-up">STICKERS</div>
                    </div>
                </div>
                <div id="tabs">
                    <section id="basics" data-index="1" class="tab">
                        <h2 class="tab-title">Basics</h2>
                        <div ng-controller="CropController" class="basics-item">
                            <div ng-click="cropper.start($event)">
                                <i class="mdi mdi-crop basics-icon"></i>
                                <div class="icon-title">Crop</div>
                            </div>

                            <div data-name="crop" class="actions-menu md-whiteframe-z1" ng-class="activePanel == 'crop' ? 'open' : 'closed'">
                                <div class="menu-header"><h3>Crop</h3></div>
                                <div class="row">
                                    <md-input-container class="col-sm-6">
                                        <label>Width</label>
                                        <input type="text" ng-model="width" ng-change="cropzone.setWidth(width)">
                                    </md-input-container>
                                    <md-input-container class="col-sm-6">
                                        <label>Height</label>
                                        <input type="text" ng-model="height" ng-change="cropzone.setHeight(height)">
                                    </md-input-container>
                                </div>
                                <div class="buttons">
                                    <md-button ng-click="cropper.stop()">cancel</md-button>
                                    <md-button ng-click="cropper.crop()" class="md-primary md-raised">crop</md-button>
                                </div>
                            </div>
                        </div>

                        <div ng-controller="RotateController" class="basics-item">
                            <div ng-click="startRotator($event)">
                                <i class="mdi mdi-rotate-right basics-icon"></i>
                                <div class="icon-title">Rotate</div>
                            </div>

                            <div data-name="rotate" class="actions-menu md-whiteframe-z1" ng-class="activePanel == 'rotate' ? 'open' : 'closed'">
                            <div class="menu-header"><h3>Rotate</h3></div>

                                <div class="rotate-icons">
                                    <i class="mdi mdi-rotate-left" ng-click="rotateProper(-90)"></i>
                                    <i class="mdi mdi-rotate-right" ng-click="rotateProper(90)"></i>
                                </div>

                                <section class="menu-group">
                                    <div class="md-slider">
                                        <div class="slider-label">Angle</div>
                                        <md-slider aria-label="Angle" step="1" ng-model="angle" ng-change="rotate(angle)" min="0" max="360" ></md-slider>
                                    </div>
                                    <div class="slider-input">
                                        <input type="number" ng-model="angle" ng-change="rotate(angle)" min="0" max="360"/>
                                    </div>
                                </section>

                                <div class="buttons">
                                    <md-button ng-click="cancel()">cancel</md-button>
                                    <md-button ng-click="applyRotation()" class="md-primary md-raised">apply</md-button>
                                </div>
                            </div>
                        </div>

                        <div ng-controller="ResizeController" class="basics-item">
                            <div ng-click="startResizer($event)">
                                <i class="mdi mdi-open-with basics-icon"></i>
                                <div class="icon-title">Resize</div>
                            </div>

                            <div data-name="resize" class="actions-menu md-whiteframe-z1" ng-class="activePanel == 'resize' ? 'open' : 'closed'">
                                <div class="menu-header"><h3>Resize</h3></div>

                                <div class="clearfix">
                                    <md-input-container class="col-sm-6">
                                        <label>Width</label>
                                        <input type="number" ng-model="width" ng-change="aspectToHeight(width)">
                                    </md-input-container>

                                    <md-input-container class="col-sm-6">
                                        <label>Height</label>
                                        <input type="number" ng-model="height" ng-change="aspectToWidth(height)">
                                    </md-input-container>
                                </div>

                                <md-checkbox ng-model="usePercentages" ng-change="togglePercentages(usePercentages)">Use Percentages</md-checkbox>
                                <md-checkbox ng-model="constrainProportions">Maintain Aspect Ratio</md-checkbox>

                                <div class="buttons margin-top">
                                    <md-button ng-click="close()">close</md-button>
                                    <md-button ng-click="apply()" class="md-primary md-raised">resize</md-button>
                                </div>
                            </div>
                        </div>

                        <div ng-controller="RoundedCornersController" class="basics-item">
                            <div ng-click="startRoundedCorners($event)">
                                <i class="mdi mdi-panorama-wide-angle basics-icon"></i>
                                <div class="icon-title">Round</div>
                            </div>

                            <div data-name="round" class="actions-menu md-whiteframe-z1" ng-class="activePanel == 'round' ? 'open' : 'closed'">
                                <div class="menu-header"><h3>Round</h3></div>

                                <section class="menu-group">
                                    <div class="md-slider">
                                        <div class="slider-label">Radius</div>
                                        <md-slider aria-label="Radius" step="1" ng-model="radius" ng-change="adjustPreview()" min="1" max="350" ></md-slider>
                                    </div>
                                    <div class="slider-input">
                                        <input type="number" ng-model="radius" ng-change="adjustPreview()"/>
                                    </div>
                                </section>

                                <div class="buttons">
                                    <md-button ng-click="cancel()">Cancel</md-button>
                                    <md-button ng-click="apply()" class="md-primary md-raised">Apply</md-button>
                                </div>
                            </div>
                        </div>

                        <div ng-controller="CanvasBackgroundController" class="basics-item">
                            <div ng-click="openPanel('canvasColor', $event)">
                                <i class="mdi mdi-format-color-fill basics-icon"></i>
                                <div class="icon-title">Color</div>
                            </div>

                            <div data-name="canvasColor" class="actions-menu md-whiteframe-z1 fluid" ng-class="activePanel == 'canvasColor' ? 'open' : 'closed'">
                                <div class="menu-header"><h3>Canvas Background Color</h3></div>


                                <input ed-flat ed-color-picker="setBackground(color)" type="text"/>


                                <div class="buttons">
                                    <md-button ng-click="cancel()">Cancel</md-button>
                                    <md-button ng-click="apply()" class="md-primary md-raised">Apply</md-button>
                                </div>
                            </div>
                        </div>

                        <div class="basics-item" ng-class="{ disabled: canvas.fabric._objects.length <= 1 }">
                            <div ng-click="canvas.mergeObjects()">
                                <i class="mdi mdi-merge-type basics-icon"></i>
                                <div class="icon-title">Merge</div>
                            </div>
                        </div>
                    </section>

                    <section id="text" data-index="2" class="tab" ng-controller="TextController">
                        <h2 class="tab-title">Pick a Font</h2>

                        <div class="filter-inputs">
                            <div class="filter-input">
                                <md-select ng-model="filters.category" ng-change="fonts.paginator.filter(filters)" placeholder="Select a Type">
                                    <md-option value="serif">Serif</md-option>
                                    <md-option value="sans-serif">Sans Serif</md-option>
                                    <md-option value="display">Display</md-option>
                                    <md-option value="handwriting">Handwriting</md-option>
                                    <md-option value="monospace">Monospace</md-option>
                                </md-select>
                            </div>

                            <md-input-container class="filter-input">
                                <label>Search</label>
                                <input type="text" ng-model="filters.family" ng-change="fonts.paginator.filter(filters)">
                            </md-input-container>
                        </div>

                        <div ng-hide="activeTab !== 'text'" class="pagination md-whiteframe-z1" ed-fonts-pagination></div>

                        <section class="fonts-preview" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                            <div class="font" ng-style="{ 'font-family':  font.family }" ng-repeat="font in fonts.paginator.currentItems" ng-click="changeFont(font.family, $event)">{{ font.family }}</div>
                        </section>

                        <div data-name="text" class="actions-menu wider md-whiteframe-z1" ng-class="isPanelEnabled() ? 'open' : 'closed'">
                            <div class="menu-header"><h3>Text</h3></div>

                            <section class="actions-menu-inner" ng-style="{ 'max-height': maxPanelHeight }" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                                <div class="md-slider">
                                    <div class="slider-label">Opacity</div>
                                    <md-slider aria-label="text opacity" step="0.1" ng-model="opacity" ng-change="text.setProperty('opacity', opacity)" min="0" max="1"></md-slider>
                                </div>
                                <div class="slider-input">
                                    <input min="0.1" max="1" step="0.1" type="number" ng-change="text.setProperty('opacity', opacity)" ng-model="opacity"/>
                                </div>

                                <div class="md-slider">
                                    <div class="slider-label">Font Size</div>
                                    <md-slider aria-label="text size" step="1" ng-change="text.setProperty('fontSize', fontSize)" ng-model="fontSize" min="1" max="100"></md-slider>
                                </div>
                                <div class="slider-input">
                                    <input type="number" ng-change="text.setProperty('fontSize', fontSize)" ng-model="fontSize"/>
                                </div>

                                <div class="text-styles">
                                    <div class="text-style-toolbar" ed-text-align-buttons>
                                        <i data-align="left" class="mdi mdi-format-align-left"></i>
                                        <i data-align="center" class="mdi mdi-format-align-center active"></i>
                                        <i data-align="right" class="mdi mdi-format-align-right"></i>
                                    </div>
                                    <div class="text-style-toolbar text-decoration-buttons" ed-text-decoration-buttons>
                                        <div data-decoration="underline" class="underline toolbar-btn">U</div>
                                        <div data-decoration="line-through" class="line-through toolbar-btn">S</div>
                                        <div data-decoration="overline" class="overline toolbar-btn">O</div>
                                        <div data-decoration="italic" class="italic toolbar-btn">I</div>
                                    </div>
                                </div>

                                <div class="colorpicker">
                                    <div class="colorpicker-label"><span>Color</span></div>
                                    <input ed-color-picker="text.setProperty('fill', color)" type="text"/>
                                </div>

                                <div class="colorpicker">
                                    <md-checkbox class="md-checkbox" ng-model="enableBackground" ng-change="text.toggleProperty('backgroundColor', enableBackground)" aria-label="Background">Background</md-checkbox>
                                    <input ed-color-picker="text.setProperty('backgroundColor', color)" ed-color-picker-disabled="{{ !enableBackground }}" type="text"/>
                                </div>


                                <div class="colorpicker">
                                    <md-checkbox class="md-checkbox" ng-model="enableOutline" ng-change="text.toggleProperty('stroke', enableOutline)" aria-label="Outline">Outline</md-checkbox>
                                    <input ed-color-picker-disabled="{{ !enableOutline }}" ed-color-picker="text.setProperty('stroke', color)" type="text"/>
                                </div>

                                <div class="md-inputs">
                                    <md-input-container>
                                        <label>Line Height</label>
                                        <input type="number" min="1" max="100" ng-model="lineHeight" ng-change="text.setProperty('lineHeight', lineHeight)">
                                    </md-input-container>
                                    <md-input-container>
                                        <label>Outline Width</label>
                                        <input ng-disabled="!enableOutline" type="number" min="1" max="100" ng-model="strokeWidth" ng-change="text.setProperty('strokeWidth', strokeWidth)">
                                    </md-input-container>
                                </div>

                                <div class="buttons">
                                    <md-button ng-click="finishAddingTextToCanvas()" class="md-primary md-raised">Save</md-button>
                                    <md-button ng-click="cancelAddingTextToCanvas()" class="md-raised">Cancel</md-button>
                                </div>
                            </section>
                        </div>
                    </section>
                    <section id="drawing" class="tab" data-index="3" ng-controller="DrawingController">
                        <h2 class="tab-title">Pick a Brush</h2>
                        <div id="brushes">
                            <div ng-repeat="brush in drawing.availableBrushes" ng-class="{ active: drawing.activeBrushName == brush }" class="brush" ng-click="changeBrush(brush, $event)">
                                <img title="{{ brush }}" class="img-responsive" ng-src="assets/images/brushes/{{brush}}.png"/>
                            </div>
                        </div>

                        <div data-name="drawing" class="actions-menu wider md-whiteframe-z1" ng-class="activePanel == 'drawing' ? 'open' : 'closed'">
                            <div class="menu-header"><h3>Brush</h3></div>

                            <section class="actions-menu-inner" ng-style="{ 'max-height': maxPanelHeight }" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                                <div class="md-slider">
                                    <div class="slider-label">Brush Thickness</div>
                                    <md-slider aria-label="brush thickness" step="1" ng-model="drawing.params.brushWidth" ng-change="drawing.setProperty('width', drawing.params.brushWidth)" min="1" max="100"></md-slider>
                                </div>
                                <div class="slider-input">
                                    <input type="number" ng-change="drawing.setProperty('width', drawing.params.brushWidth)" ng-model="drawing.params.brushWidth"/>
                                </div>


                                <div class="colorpicker">
                                    <div class="colorpicker-label"><span>Color</span></div>
                                    <input ng-model="drawing.params.brushColor" ed-color-picker="drawing.setProperty('color', color)" type="text"/>
                                </div>

                                <div class="heading-with-switcher">
                                    <h3>Shadow</h3>
                                    <md-switch class="md-switch" ng-model="drawing.params.enableShadow" ng-change="drawing.toggleShadow(drawing.params.enableShadow)" aria-label="Enable Shadow"></md-switch>
                                </div>

                                <div class="md-slider">
                                    <div class="slider-label"><span>Blur</span></div>
                                    <md-slider aria-label="shadow blur" ng-disabled="!drawing.params.enableShadow" step="1" ng-model="drawing.params.shadowBlur" ng-change="drawing.setShadowProperty('blur', drawing.params.shadowBlur)" min="1" max="100"></md-slider>
                                </div>
                                <div class="slider-input">
                                    <input type="number" ng-change="drawing.setShadowProperty('blur', drawing.params.shadowBlur)" ng-disabled="!drawing.params.enableShadow" ng-model="drawing.params.shadowBlur"/>
                                </div>

                                <div class="md-slider">
                                    <div class="slider-label"><span>Offset X</span></div>
                                    <md-slider ng-disabled="!drawing.params.enableShadow" aria-label="shadow blur" step="1" ng-model="drawing.params.shadowOffsetX" ng-change="drawing.setShadowProperty('offsetX', drawing.params.shadowOffsetX)" min="1" max="100"></md-slider>
                                </div>
                                <div class="slider-input">
                                    <input type="number" ng-change="drawing.setShadowProperty('offsetX', drawing.params.shadowOffsetX)" ng-disabled="!drawing.params.enableShadow" min="1" ng-model="drawing.params.shadowOffsetX"/>
                                </div>

                                <div class="md-slider">
                                    <div class="slider-label"><span>Offset Y</span></div>
                                    <md-slider ng-disabled="!drawing.params.enableShadow" aria-label="shadow blur" step="1" ng-model="drawing.params.shadowOffsetY" ng-change="drawing.setShadowProperty('offsetY', drawing.params.shadowOffsetY)" min="1" max="100"></md-slider>
                                </div>
                                <div class="slider-input">
                                    <input type="number" ng-change="drawing.setShadowProperty('offsetY', drawing.params.shadowOffsetY)" ng-disabled="!drawing.params.enableShadow" min="1" ng-model="drawing.params.shadowOffsetY"/>
                                </div>

                                <div class="colorpicker">
                                    <div class="colorpicker-label"><span>Color</span></div>
                                    <input ng-disabled="!drawing.params.enableShadow" ng-model="drawing.params.shadowColor" start-color="{{ drawing.params.shadowColor }}" ed-color-picker="drawing.setShadowProperty('color', color)" type="text"/>
                                </div>

                                <div class="buttons">
                                    <md-button ng-click="finishAddingDrawingsToCanvas()" class="md-primary md-raised">Save</md-button>
                                    <md-button ng-click="cancelAddingDrawingsToCanvas()" class="md-raised">Cancel</md-button>
                                </div>
                            </section>
                        </div>
                    </section>
                    <section id="filters" class="tab" data-index="4" ng-controller="FiltersController">
                        <h2 class="tab-title">Pick a Filter</h2>
                        <div class="filters-list row" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                            <figure ng-class="{ applied: filters.filterAlreadyApplied(filter.name) }" ng-repeat="filter in filters.all" ng-click="filters.applyFilter(filter)" class="filter col-sm-6">
                                <div class="filter-image">
                                    <img ng-src="assets/images/filters/{{ filter.name.toLowerCase() }}.png" class="img-responsive md-whiteframe-z1"/>
                                    <div ng-class="{ 'remove-only': !filter.options }" class="remove-filter-overlay">
                                        <i class="mdi mdi-cancel"></i>
                                        <i ng-if="filter.options" ng-click="filters.lastAppliedFilter = filter; $event.stopPropagation();" class="mdi mdi-settings"></i>
                                    </div>
                                </div>
                                <figcaption>{{ filter.displayName || filter.name }}</figcaption>
                            </figure>
                        </div>

                        <div class="actions-menu md-whiteframe-z1" ng-class="filters.lastAppliedFilter.options ? 'open' : 'closed'">
                            <div class="menu-header"><h3>{{ filters.lastAppliedFilter.name }}</h3></div>

                            <section class="actions-menu-inner" ng-style="{ 'max-height': maxPanelHeight }" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                                <div ng-repeat="(key,value) in filters.lastAppliedFilter.options">

                                    <section ng-if="!value.colorpicker && !value.select">
                                        <div class="md-slider">
                                            <div class="slider-label">{{ key == filters.lastAppliedFilter.name ? 'amount' : key }}</div>
                                            <md-slider
                                                    md-discrete
                                                    aria-label="{{ key }}"
                                                    step="{{ value.step ? value.step : 1 }}"
                                                    ng-model="filters.lastAppliedFilter.options[key].current"
                                                    ng-change="filters.applyValue(filters.lastAppliedFilter.name, key, filters.lastAppliedFilter.options[key].current)"
                                                    min="{{ value.min ? value.min : 1 }}"
                                                    max="{{ value.max ? value.max : 250 }}"
                                                    ></md-slider>
                                        </div>
                                        <div class="slider-input">
                                            <input ng-if="!value.colorpicker" type="number" ng-change="filters.applyValue(filters.lastAppliedFilter.name, key, filters.lastAppliedFilter.options[key].current)" ng-model="filters.lastAppliedFilter.options[key].current"/>
                                        </div>
                                    </section>

                                    <section ng-if="value.colorpicker" class="colorpicker">
                                        <div class="colorpicker-label"><span>{{ key }}</span></div>
                                        <input ed-discrete ng-model="filters.lastAppliedFilter.options[key].current" start-color="{{ filters.lastAppliedFilter.options[key].current }}" ed-color-picker="filters.applyValue(filters.lastAppliedFilter.name, key, color)" type="text"/>
                                    </section>

                                    <section ng-if="value.select">
                                        <div class="col-sm-8 pull-down">{{ key }}</div>
                                        <div class="col-sm-4 no-padding">
                                            <select class="form-control" ng-model="filters.lastAppliedFilter.options[key].current" ng-change="filters.applyValue(filters.lastAppliedFilter.name, key, filters.lastAppliedFilter.options[key].current)">
                                                <option ng-repeat="mode in filters.lastAppliedFilter.options[key].available" value="{{ mode }}">{{ mode }}</option>
                                            </select>
                                        </div>
                                    </section>
                                </div>
                            </section>
                        </div>
                    </section>
                    <section id="simple-shapes" class="tab" data-index="5" ng-controller="SimpleShapesController">
                        <h2 class="tab-title">Pick a Shape</h2>

                        <div class="shapes-list">
                            <div class="shape" data-name="{{ shape.name }}" ng-repeat="shape in shapes.available" ng-click="shapes.addToCanvas(shape)">
                                <div class="shape-image" id="{{ shape.name }}"><div class="css-shape"></div></div>
                                <div class="shape-name">{{ shape.displayName || shape.name }}</div>
                            </div>
                        </div>

                        <div class="actions-menu md-whiteframe-z1" ng-class="isPanelEnabled() ? 'open' : 'closed'">
                            <div class="menu-header"><h3>{{ shapes.selected.displayName || shapes.selected.name }}</h3></div>

                            <section class="actions-menu-inner" ng-style="{ 'max-height': maxPanelHeight }" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                                <section id="object-fills">
                                    <div class="fill-activator">
                                        <div class="fill-activator-label">Image</div>
                                        <button class="fill-activator-button image-activator" ng-click="openBottomSheet('image')"></button>
                                    </div>

                                    <div class="fill-activator">
                                        <div class="fill-activator-label">Gradient</div>
                                        <button class="fill-activator-button gradient-activator" ng-click="openBottomSheet('gradient')"></button>
                                    </div>

                                    <div class="fill-activator">
                                        <div class="fill-activator-label">Color</div>
                                        <input ed-discrete start-color="{{ shapes.selected.options.main.fill.current }}" ng-model="shapes.selected.options.main.fill.current" ed-color-picker="shapes.applyValue('main', shapes.selected.name, 'fill', color)"  type="text"/>
                                    </div>

                                </section>

                                <div ng-repeat="group in shapes.selected.options | orderOptions" class="clearfix">

                                    <div ng-if="group.name !== 'main'" class="heading-with-switcher">
                                        <h3>{{ group.name }}</h3>
                                        <md-switch class="md-switch" ng-model="shapes.selected.options[group.name].enabled" ng-change="shapes[group.onToggle](shapes.selected.name, shapes.selected.options[group.name].enabled)" aria-label="Toggle {{ group.name }}"></md-switch>
                                    </div>

                                    <div ng-repeat="(optionName, option) in group">

                                        <section ng-if="option.type === 'slider'">
                                            <div class="md-slider">
                                                <div class="slider-label">{{ option.displayName || optionName }}</div>

                                                <md-slider
                                                        md-discrete
                                                        aria-label="{{ optionName }}"
                                                        step="{{ option.step ? option.step : 1 }}"
                                                        ng-model="shapes.selected.options[group.name][optionName].current"
                                                        ng-change="shapes.applyValue(group.name, shapes.selected.name, optionName, shapes.selected.options[group.name][optionName].current)"
                                                        min="{{ option.min ? option.min : 1 }}"
                                                        max="{{ option.max ? option.max : 250 }}"
                                                        ng-disabled="!group.enabled"
                                                        ></md-slider>
                                            </div>
                                            <div class="slider-input">
                                                <input type="number" ng-change="shapes.applyValue(group.name, shapes.selected.name, optionName, shapes.selected.options[group.name][optionName].current)" ng-disabled="!group.enabled" ng-model="shapes.selected.options[group.name][optionName].current"/>
                                            </div>
                                        </section>

                                        <section ng-if="option.type === 'colorpicker' && !option.hidden" class="colorpicker">
                                            <div class="colorpicker-label"><span>{{ option.displayName || optionName }}</span></div>
                                            <input start-color="{{ option.current }}" ed-discrete ng-disabled="!group.enabled"
                                                   ng-model="shapes.selected.options[group.name][optionName].current" ed-color-picker="shapes.applyValue(group.name, shapes.selected.name, optionName, color)"  type="text"/>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>

                    <section id="stickers" class="tab" data-index="6" ng-controller="StickersController">

                        <div data-name="stickers" class="actions-menu md-whiteframe-z1" ng-class="isPanelEnabled() ? 'open' : 'closed'">
                            <div class="menu-header"><h3>Sticker</h3></div>
                            <section class="actions-menu-inner" ng-style="{ 'max-height': maxPanelHeight }" ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light">
                               <div class="md-slider">
                                   <div class="slider-label">Opacity</div>
                                   <md-slider aria-label="shape opacity" step="0.1" ng-model="opacity" ng-change="setOpacity(opacity)" min="0" max="1"></md-slider>
                               </div>
                               <div class="slider-input">
                                   <input type="number" ng-change="setOpacity(opacity)" step="0.1" min="0.1" max="1" ng-model="opacity"/>
                               </div>
                               <section class="colorpicker" ng-if="activeStickerIsSvg()">
                                   <div class="colorpicker-label"><span>Color</span></div>
                                   <input start-color="#000" ng-model="color" ed-color-picker="setColor(color)"  type="text"/>
                               </section>
                           </section>
                        </div>
                        <div ed-pretty-scrollbar ed-scroll-axis="y" ed-scroll-theme="light" ed-stickers-categories style="height: 100%">
                            <section ng-repeat="category in categories" class="sticker-category-container">
                                <div class="category-header" data-name="{{ category.name }}">{{ category.name }}</div>
                                <div class="category-stickers" ng-class="{ 'open animated slideInDown': activeCategory === category.name, 'dark-bg': category.darkbg }">
                                    <div ng-repeat="doodle in category.items track by $index" ng-click="addToCanvas(category, $index+1, $event)" class="sticker">
                                        <img class="img-responsive" data-src="assets/images/stickers/{{category.name}}/{{$index+1}}.{{ category.type }}"/>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
            </section>

            <section id="viewport">

                <section id="top-panel" class="md-whiteframe-z1" ng-controller="TopPanelController">
                    <md-button ng-click="openUploadDialog($event)" ng-if="!getParam('hideOpenButton')">Open</md-button>
                    <md-button ng-class="{ inactive: !historyPanelOpen }" ng-click="toggleRightPanel('history', $event)">History</md-button>
                    <md-button ng-class="{ inactive: !objectsPanelOpen }" ng-click="toggleRightPanel('objects', $event)">Layers</md-button>
                    <md-button ng-click="openSaveDialog($event)" class="md-primary md-raised">Save</md-button>
                </section>

                <canvas ng-show="started" id="canvas" class="md-whiteframe-z2"></canvas>
            </section>

            <div id="bottom-bar" ng-controller="ZoomController">
                <section class="zoom-container md-whiteframe-z1">
                    <div class="current-zoom">{{ getCurrentZoom() }}%</div>
                    <div class="zoom-slider">
                        <md-slider aria-label="zoom" step="1" ng-model="zoom" ng-change="doZoom()"  min="{{ minScale }}" max="{{ maxScale }}"></md-slider>
                    </div>
                    <div class="action-icons">
                        <i ng-click="canvas.fitToScreen()" class="mdi mdi-filter-center-focus fit-to-screen"><md-tooltip md-delay="200">Fit to screen</md-tooltip></i>
                        <i ng-click="canvas.zoom(1)" class="mdi mdi-fullscreen original-size"><md-tooltip md-delay="200">Original size</md-tooltip></i>
                    </div>
                    <div ed-ie-slider-fix></div>
                </section>
            </div>

            <script src="assets/js/scripts.min.js?v23"></script>

            <script type="application/ng-template" id="gradient-sheet-template">
                <md-bottom-sheet class="bottom-sheet gradients-sheet">
                    <div class="items-list" ed-pretty-scrollbar>
                        <div ng-repeat="g in shapes.gradients" ng-style="{background: 'url(assets/images/gradients/'+($index+1)+'.png)'}" ng-click="shapes.fillWithGradient($index+1)" class="item md-whiteframe-z1"></div>
                    </div>
                </md-bottom-sheet>
            </script>

            <script type="application/ng-template" id="image-sheet-template">
                <md-bottom-sheet class="bottom-sheet images-sheet">
                    <div class="upload-new" ng-click="showDialog($event)">
                        <i class="mdi mdi-cloud-upload"></i>
                        <span class="icon-label">Upload</span>
                    </div>
                    <div class="items-list" ed-pretty-scrollbar>
                        <div ng-repeat="t in shapes.textures track by $index" ng-style="{background: 'url(assets/images/textures/'+$index+'.png)'}" ng-click="shapes.fillWithImage('assets/images/textures/'+$index+'.png')" class="item md-whiteframe-z1"></div>
                    </div>
                </md-bottom-sheet>
            </script>

            <script type="application/ng-template" id="texture-upload-dialog-template">
                <md-dialog class="upload-file-dialog">
                    <md-input-container>
                        <label>Image URL</label>
                        <input type="text" ng-model="imageBgUrl" ng-change="shapes.fillWithImage(imageBgUrl)" ng-model-options="{ debounce: 500 }">
                    </md-input-container>

                    <h2><span>OR</span></h2>

                    <label class="pretty-upload">
                        <input type="file" ed-file-uploader="shapes.fillWithImage" ed-close-after/>
                        <i class="mdi mdi-cloud-upload"></i>
                        <span class="upload-button-label">Upload From Computer</span>
                    </label>
                </md-dialog>
            </script>

            <script type="application/ng-template" id="save-image-dialog">
                <md-dialog class="upload-file-dialog save-dialog">
                    <md-input-container>
                        <label>File Name</label>
                        <input type="text" ng-model="imageName">
                    </md-input-container>

                    <md-radio-group ng-model="imageType">
                        <md-radio-button value="jpeg">JPEG</md-radio-button>
                        <md-radio-button value="png">PNG</md-radio-button>
                        <md-radio-button value="json">JSON</md-radio-button>
                    </md-radio-group>

                    <div ng-if="imageType === 'jpeg'">
                        <div class="slider-label">Quality {{ imageQuality }}</div>
                        <md-slider aria-label="Angle" md-discrete ng-model="imageQuality" step="1" min="1" max="10" ></md-slider>
                    </div>

                    <p ng-if="imageType === 'json'">This will download a file with current pixie editor state so you can load it into pixie later.</p>

                    <md-button ng-click="saveImage($event)" class="md-raised md-primary">Save</md-button>

                    <div class="demo-alert" ng-if="isDemo">Image saving is disabled on demo site.</div>
                </md-dialog>
            </script>

            <script type="application/ng-template" id="main-image-upload-dialog-template">
                <md-dialog class="upload-file-dialog">
                    <div ng-show="openImageMode === 'open'">
                        <md-input-container>
                            <label>Image URL</label>
                            <input type="text" ng-model="openImageUrl" ng-change="showImagePreview(openImageUrl)" ng-model-options="{ debounce: 500 }">
                        </md-input-container>

                        <h2><span>OR</span></h2>

                        <label class="pretty-upload">
                            <input type="file" ed-file-uploader="showImagePreview"/>
                            <i class="mdi mdi-cloud-upload"></i>
                            <span class="upload-button-label">Upload From Computer</span>
                        </label>

                        <h2><span>OR</span></h2>

                        <div class="buttons" ng-show="!canOpenImage">
                            <md-button ng-click="openImageMode = 'create'" class="md-primary">Create New</md-button>
                            <md-button ng-click="openSampleImage()">Sample</md-button>
                        </div>

                        <div ng-show="canOpenImage">
                            <div class="img-preview"></div>

                            <div class="buttons">
                                <md-button ng-click="openImage()" class="md-primary md-raised">Open</md-button>
                                <md-button ng-click="closeUploadDialog()" class="md-raised">Close</md-button>
                            </div>
                        </div>
                    </div>

                    <div class="new-canvas" ng-show="openImageMode === 'create'">
                        <md-input-container>
                            <label>Width</label>
                            <input min="1" max="5000" type="number" ng-model="canvasWidth">
                        </md-input-container>

                        <md-input-container>
                            <label>Height</label>
                            <input min="1" max="5000" type="number" ng-model="canvasHeight">
                        </md-input-container>

                        <div class="buttons">
                            <md-button ng-click="openImageMode = 'open'" class="md-raised">Cancel</md-button>
                            <md-button ng-click="createNewCanvas(canvasWidth, canvasHeight)" class="md-primary md-raised">Create</md-button>
                        </div>
                    </div>
                </md-dialog>
            </script>

            <script type="text/ng-template" id="modals/polygon.html">
                <md-dialog class="md-modal">
                    <div class="md-modal-header">
                        <h1>Polygon Instructions</h1>
                        <div ng-click="closeModal()" class="md-close-modal"><i class="mdi mdi-close"></i></div>
                    </div>

                    <ol>
                        <li>Click on the canvas where you want to start the polygon edge.</li>
                        <li>Drag your mouse.</li>
                        <li>Click again where you want to end the edge.</li>
                        <li>Repeat to add more edges.</li>
                        <li>Hit escape or click anywhere outside of canvas to finish.</li>
                    </ol>

                    <div class="buttons">
                        <md-button class="md-primary md-raised" ng-click="closeModal()">got it</md-button>
                    </div>
                </md-dialog>
        </script>
        </div>
    </body>

</html>
