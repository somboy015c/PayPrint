<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>

                <h1 class="page-title"><?php echo $title; ?></h1>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="row-custom">
                    <!-- load profile nav -->
                    <?php $this->load->view("earnings/_earnings_tabs"); ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                    <!-- include message block -->
                    <?php $this->load->view('product/_messages'); ?>
                

















    <div class="row-custom table-earnings-container" style="margin-top: 0px;">
        <div role="tabpanel" class="tab-pane active show" id="home1" aria-labelledby="home-tab1" aria-expanded="true">
                                    



            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card d-flex mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-cart"></i>
                            </span>
                            <div class="icon_specs">
                                <p><?php if ($user->role == 'member') { echo "Workshop Days Left";} else { echo "Shop Days Left";} ?></p>
                                <span><?php if ($user->role == 'member') { $d_l = date_difference($user->workshop_end_date, date('Y-m-d H:i:s')); if ($d_l >= 1) { echo $d_l;} else { echo 0;} } else { $d_l = date_difference($user->shop_end_date, date('Y-m-d H:i:s')); if ($d_l >= 1) { echo $d_l;} else { echo 0;} } ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-shopping-basket"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Total Ordered Sales</p>
                                <span><?php echo $this->order_model->get_ordered_sales_count($user->id); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-0 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-shopping-bag"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Total Completed Sales</p>
                                <span><?php echo $this->order_model->get_completed_sales_count($user->id); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>





































                <div class="row">
                <div class="col-lg-8 stretched_card">
                    <div class="card" style="width: 100%; height: 100%;">
                        <div class="card-body">
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Revenue overview</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-2 d-none d-md-block tab_links">
                                            <a href="#" class="active">Weekly</a>
                                            <a href="#">Yearly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-4">Consectetur adipisicing elit. Blanditiis cumque cupiditate, deserunt dolor esse et, iste labore laboriosam magni maxime molestiae officia.</p>
                            <div dir="ltr" class="resize-sensor" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div class="resize-sensor-expand" style="pointer-events: none; position: absolute; left: 0px; top: 0px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 567px; height: 360px;"></div></div><div class="resize-sensor-shrink" style="pointer-events: none; position: absolute; left: 0px; top: 0px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div><div style="width: 100%; height: 100%; position: relative; top: -0.5px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="group" style="width: 100%; height: 100%; overflow: visible;"><desc>JavaScript chart by amCharts</desc>

                                <defs><clipPath id="id-26"><rect width="100%" height="100%"></rect></clipPath><linearGradient id="gradient-id-45" x1="1%" x2="99%" y1="59%" y2="41%"><stop stop-color="#474758" offset="0"></stop><stop stop-color="#474758" stop-opacity="1" offset="0.75"></stop><stop stop-color="#3cabff" stop-opacity="1" offset="0.755"></stop></linearGradient><filter id="filter-id-51" width="200%" height="200%" x="-50%" y="-50%"></filter><filter id="filter-id-70" width="200%" height="200%" x="-50%" y="-50%"></filter><clipPath id="id-102"><path d="M0,0 L490,0 L490,285 L0,285 L0,0"></path></clipPath><clipPath id="id-121"><path d="M0,0 L490,0 L490,285 L0,285 L0,0"></path></clipPath><clipPath id="id-343"><rect class="col-12"></rect></clipPath>








                                    <filter id="filter-id-28" width="200%" height="200%" x="-50%" y="-50%"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></feGaussianBlur><feOffset result="offsetBlur" dx="1" dy="1"></feOffset><feFlood flood-color="#000000" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><filter id="filter-id-42" width="120%" height="120%" x="-10%" y="-10%"><feColorMatrix type="saturate" values="0"></feColorMatrix></filter><filter id="filter-id-104" width="200%" height="200%" x="-50%" y="-50%"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></feGaussianBlur><feOffset result="offsetBlur" dx="1" dy="1"></feOffset><feFlood flood-color="#000000" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><filter id="filter-id-123" width="200%" height="200%" x="-50%" y="-50%"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></feGaussianBlur><feOffset result="offsetBlur" dx="1" dy="1"></feOffset><feFlood flood-color="#000000" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><filter id="filter-id-118" width="200%" height="200%" x="-50%" y="-50%"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="8"></feGaussianBlur><feOffset result="offsetBlur" dx="1" dy="15"></feOffset><feFlood flood-color="#832F9C" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><filter id="filter-id-122" width="200%" height="200%" x="-50%" y="-50%"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="8"></feGaussianBlur><feOffset result="offsetBlur" dx="1" dy="15"></feOffset><feFlood flood-color="#832F9C" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter>












                                    <filter id="filter-id-99"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="8"></feGaussianBlur><feOffset result="offsetBlur"></feOffset><feFlood flood-color="#fa6c39" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><filter id="filter-id-103"><feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="8"></feGaussianBlur><feOffset result="offsetBlur" dx="1" dy="15"></feOffset><feFlood flood-color="#fa6c39" flood-opacity="0.5"></feFlood><feComposite in2="offsetBlur" operator="in"></feComposite><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter>










                                    </defs>

                                <g><g fill="#ffffff" fill-opacity="0"><rect class="col-12" width="100%" height="100%"></rect></g><g><g role="region" clip-path="url(#id-26)" opacity="1" aria-label="Chart"><g transform="translate(15,15)"><g><g><g><g><g><g><g style="touch-action: none; user-select: none;" transform="translate(37,0)"><g fill="#ffffff" fill-opacity="0"><rect class="col-12"></rect></g><g><g><g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,380)" display="none"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,380)" display="none"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" display="none"><path d="M0,285 L0,285 L490,285 L490,285 L0,285"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,332.5)" display="none"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,332.5)" display="none"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;"><path d="M0,285 L0,285 L490,285 L490,285 L0,285"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,285)"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,285)"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" display="none"><path d="M0,237.5 L0,285 L490,285 L490,237.5 L0,237.5"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,237.5)"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,237.5)"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;"><path d="M0,190 L0,237.5 L490,237.5 L490,190 L0,190"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,190)"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,190)"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" display="none"><path d="M0,142.5 L0,190 L490,190 L490,142.5 L0,142.5"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,142.5)"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,142.5)"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;"><path d="M0,95 L0,142.5 L490,142.5 L490,95 L0,95"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,95)"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,95)"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" display="none"><path d="M0,47.5 L0,95 L490,95 L490,47.5 L0,47.5"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,47.5)"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,47.5)"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;"><path d="M0,0 L0,47.5 L490,47.5 L490,0 L0,0"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" display="none"><path d="M0,0 L0,0 L490,0 L490,0 L0,0"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(0,-47.5)" display="none"><path d=" M0,0  L-5,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,-47.5)" display="none"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;"><path d="M0,0 L0,0 L490,0 L490,0 L0,0"></path></g></g></g><g><g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(35.000699999999995,285)"><path d=" M0,0  L0,5 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0" fill="none" transform="translate(35.000699999999995,0)"><path d=" M0,0  L0,285 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" opacity="0" display="none"><path d="M0,0 L0,285 L139.99790000000002,285 L139.99790000000002,0 L0,0"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" display="none" transform="translate(525.0006999999999,285)"><path d=" M0,0  L0,5 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0" fill="none" display="none" transform="translate(525.0006999999999,0)"><path d=" M0,0  L0,285 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" opacity="1"><path d="M490,0 L490,285 L490,285 L490,0 L490,0"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(174.9986,285)"><path d=" M0,0  L0,5 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0" fill="none" transform="translate(174.9986,0)"><path d=" M0,0  L0,285 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" opacity="1"><path d="M139.99790000000002,0 L139.99790000000002,285 L280.0007,285 L280.0007,0 L139.99790000000002,0"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(315.0014,285)"><path d=" M0,0  L0,5 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0" fill="none" transform="translate(315.0014,0)"><path d=" M0,0  L0,285 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" opacity="0" display="none"><path d="M280.0007,0 L280.0007,285 L419.9986,285 L419.9986,0 L280.0007,0"></path></g><g fill-opacity="0" stroke-opacity="0" stroke="#000000" stroke-width="1" transform="translate(454.9993,285)"><path d=" M0,0  L0,5 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0" fill="none" transform="translate(454.9993,0)"><path d=" M0,0  L0,285 " transform="translate(-0.5,-0.5)"></path></g><g fill="#000000" fill-opacity="0" style="pointer-events: none;" opacity="1"><path d="M419.9986,0 L419.9986,285 L490,285 L490,0 L419.9986,0"></path></g></g></g><g><g><g role="group" stroke-opacity="1" fill-opacity="0" fill="#fa6c39" stroke="#fa6c39" aria-label="Sale" stroke-width="3" stroke-dasharray="10" filter="url(#filter-id-99)" opacity="1"><g><g clip-path="url(#id-102)"><g><g><g><g style="pointer-events: none;" fill="#fa6c39" fill-opacity="0" stroke="#fa6c39" stroke-opacity="1" stroke-width="3" stroke-dasharray="10"><g><g stroke-opacity="0"><path></path></g><g fill-opacity="0"><path d=" M34.8007,237.3  M35.0007,237.5  C49.0017,237.4986 77.0011,95.0005 105.0021,95 C133.0031,94.9995 146.9976,189.9995 174.9986,190 C202.9996,190.0005 216.998,142.5 245,142.5 C273.002,142.5 287.0004,190.0005 315.0014,190 C343.0024,189.9995 356.9969,95 384.9979,95 C412.9989,95 440.9983,189.9991 454.9993,190"></path></g></g></g></g></g></g></g><g></g></g></g><g role="group" stroke-opacity="1" fill-opacity="0" fill="#832f9c" stroke="#832f9c" aria-label="Orders" stroke-width="3" filter="url(#filter-id-118)" opacity="1"><g><g clip-path="url(#id-121)"><g><g><g><g style="pointer-events: none;" fill="#832f9c" fill-opacity="0" stroke="#832f9c" stroke-opacity="1" stroke-width="3"><g><g stroke-opacity="0"><path></path></g><g fill-opacity="0"><path d=" M34.8007,189.8  M35.0007,190  C49.0017,189.9986 77.0011,47.5005 105.0021,47.5 C133.0031,47.4995 146.9976,142.4995 174.9986,142.5 C202.9996,142.5005 216.998,95 245,95 C273.002,95 287.0004,142.5005 315.0014,142.5 C343.0024,142.4995 356.9969,47.5 384.9979,47.5 C412.9989,47.5 440.9983,142.499 454.9993,142.5"></path></g></g></g></g></g></g></g><g></g></g></g></g></g><g clip-path="url(#id-343)"><g><g filter="url(#filter-id-103)" fill="#fa6c39" stroke="#fa6c39"><g></g></g><g filter="url(#filter-id-122)" fill="#832f9c" stroke="#832f9c"><g></g></g></g></g><g><g></g></g><g><g></g></g><g opacity="0" visibility="hidden" style="touch-action: none; user-select: none;"><g><g fill-opacity="0.2" fill="#000000" style="pointer-events: none;" opacity="0" visibility="hidden"><path></path></g><g stroke="#000000" fill="none" stroke-dasharray="3,3" stroke-opacity="0.4" style="pointer-events: none;"><path d=" M0,0  L0,285 "></path></g><g stroke="#000000" fill="none" stroke-dasharray="3,3" stroke-opacity="0.4" style="pointer-events: none;" transform="translate(0,169.5)"><path d=" M0,0  L490,0 "></path></g></g></g><g role="button" focusable="true" opacity="0" visibility="hidden" transform="translate(450,-3)" aria-labelledby="id-18-title"><g fill="#6794dc" stroke="#ffffff" fill-opacity="1" stroke-opacity="0" transform="translate(0,8)"><path d="M17,0 L18,0 a17,17 0 0 1 17,17 L35,17 a17,17 0 0 1 -17,17 L17,34 a17,17 0 0 1 -17,-17 L0,17 a17,17 0 0 1 17,-17 Z"></path></g><g transform="translate(9,9)"><g stroke="#ffffff" style="pointer-events: none;" transform="translate(0,8)"><path d=" M0,0  L11,0 " transform="translate(2.5,7.5)"></path></g>
                                <g fill="#000000" style="pointer-events: none;" transform="translate(17,8)"><g display="none"></g></g></g><title id="id-18-title">Zoom Out</title></g></g></g><g><g><g><g><g fill="#000000" transform="translate(0,142.5) rotate(-90)"><g display="none"></g></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(37,285)"><path transform="translate(-0.5,-0.5)" d=" M0,0  L490,0 "></path></g><g transform="translate(0,0)"><g><g fill="#000000" fill-opacity="0" opacity="0" stroke-opacity="0" transform="translate(37,142.5)"><g transform="translate(-25,-7.5)" style="user-select: none;"><text x="0" y="15" dy="-3"><tspan>70</tspan></text></g></g><g fill="#000000" transform="translate(37,380)" display="none"><g transform="translate(-31,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>-20</tspan></text></g></g><g fill="#000000" transform="translate(37,332.5)" display="none"><g transform="translate(-31,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>-10</tspan></text></g></g><g fill="#000000" transform="translate(37,285)"><g transform="translate(-20,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>0</tspan></text></g></g><g fill="#000000" transform="translate(37,237.5)"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>10</tspan></text></g></g><g fill="#000000" transform="translate(37,190)"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>20</tspan></text></g></g><g fill="#000000" transform="translate(37,142.5)"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>30</tspan></text></g></g><g fill="#000000" transform="translate(37,95)"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>40</tspan></text></g></g><g fill="#000000" transform="translate(37,47.5)"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>50</tspan></text></g></g><g fill="#000000" transform="translate(37,0)"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>60</tspan></text></g></g><g fill="#000000" transform="translate(37,-47.5)" display="none"><g transform="translate(-27,-7)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>70</tspan></text></g></g></g></g><g stroke="#000000" stroke-opacity="0" fill="none" style="pointer-events: none;" transform="translate(37,0)"><path d=" M0,0  L0,285 " transform="translate(-0.5,-0.5)"></path></g></g></g></g></g><g transform="translate(527,0)"><g></g></g></g></g><g><g transform="translate(37,0)"></g></g><g transform="translate(0,285)"><g transform="translate(37,0)"><g><g><g stroke="#000000" stroke-opacity="0" fill="none" style="pointer-events: none;"><path d=" M0,0  L490,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" display="none" transform="translate(490,-285)" opacity="0" visibility="hidden"><path transform="translate(-0.5,-0.5)" d=" M0,0  L0,285 "></path></g><g><g><g fill="#000000" fill-opacity="0" opacity="0" stroke-opacity="0" transform="translate(245,0)"><g transform="translate(-4,10)" style="user-select: none;"><text x="0" y="15" dy="-3"><tspan>L</tspan></text></g></g><g fill="#000000" transform="translate(35.000699999999995,0)"><g transform="translate(-13,10)" style="user-select: none;"><text x="0" y="15" dy="-3"><tspan>2013</tspan></text></g></g><g fill="#000000" display="none" transform="translate(525.0006999999999,0)"><g transform="translate(0,10)" display="none"></g></g><g fill="#000000" transform="translate(174.9986,0)"><g transform="translate(-13,10)" style="user-select: none;"><text x="0" y="15" dy="-3"><tspan>2015</tspan></text></g></g><g fill="#000000" transform="translate(315.0014,0)"><g transform="translate(-13.5,10)" style="user-select: none;"><text x="0" y="15" dy="-3"><tspan>2017</tspan></text></g></g><g fill="#000000" transform="translate(454.9993,0)"><g transform="translate(-15.5,10)" style="user-select: none;"><text x="0" y="14" dy="-2.8"><tspan>2019</tspan></text></g></g></g></g><g fill="#000000" transform="translate(245,35)"><g display="none"></g></g></g></g></g></g></g></g></g></g></g></g><g><g><g filter="url(#filter-id-28)" role="tooltip" visibility="hidden" opacity="0"><g fill="#ffffff" style="pointer-events: none;" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" transform="translate(0,6)"><path d="M3,0 L3,0 L0,-6 L13,0 L21,0 a3,3 0 0 1 3,3 L24,10 a3,3 0 0 1 -3,3 L3,13 a3,3 0 0 1 -3,-3 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(12,6)"><g transform="translate(0,7)" display="none"></g></g></g></g><g visibility="hidden" style="pointer-events: none;" display="none"><g fill="#ffffff" opacity="1"><rect width="100%" height="100%"></rect></g><g><g transform="translate(278.5,175)"><g><g stroke-opacity="1" fill="#f3f3f3" fill-opacity="0.8"><g><g><path d=" M53,0  a53,53,0,0,1,-106,0 a53,53,0,0,1,106,0 M42,0  a42,42,0,0,0,-84,0 a42,42,0,0,0,84,0 L42,0 "></path></g></g></g><g stroke-opacity="1" fill="#000000" fill-opacity="0.2"><g><g><path d=" M50,0  a50,50,0,0,1,-100,0 a50,50,0,0,1,100,0 M45,0  a45,45,0,0,0,-90,0 a45,45,0,0,0,90,0 L45,0 "></path></g></g></g><g fill="#000000" fill-opacity="0.4"><g style="user-select: none;"><text x="0" y="0" dy="0"><tspan>100%</tspan></text></g></g></g></g></g></g><g opacity="0.3" style="cursor: pointer;" aria-labelledby="id-42-title" filter="url(#filter-id-42)" transform="translate(0,329)"><g fill="#ffffff" opacity="0"><rect width="66" height="21"></rect></g><g><g shape-rendering="auto" fill="none" stroke-opacity="1" stroke-width="1.7999999999999998" stroke="#3cabff"><path d=" M15,15  C17.4001,15 22.7998,15.0001 27,15 C31.2002,14.9999 33.2999,6 36,6 C38.7001,6 38.6999,10.5 40.5,10.5 C42.3001,10.5 42.2999,6 45,6 C47.7001,6 50.9999,14.9999 54,15 C57.0002,15.0001 58.7999,15 60,15"></path></g><g shape-rendering="auto" fill="none" stroke-opacity="1" stroke-width="1.7999999999999998" stroke="url(#gradient-id-45)"><path d=" M6,15  C8.2501,15 9.7498,15.0001 15,15 C20.2502,14.9999 20.7748,3.6 27,3.6 C33.2252,3.6 33.8998,14.9999 39.9,15 C45.9002,15.0001 45.9748,15 51,15 C56.0252,15 57.7499,15 60,15"></path></g></g><title id="id-42-title">Chart created using amCharts library</title></g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#000000" style="pointer-events: none;" fill-opacity="1" stroke-width="1" stroke-opacity="1" stroke="#000000" transform="translate(52,300)"><path d="M0,0 L20,0 a0,0 0 0 1 0,0 L20,10 a0,0 0 0 1 -0,0 L0,10 a0,0 0 0 1 -0,-0 L0,0 a0,0 0 0 1 0,-0"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(62,300)"><g transform="translate(0,5)" display="none"></g></g></g></g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#000000" style="pointer-events: none;" fill-opacity="1" stroke-width="1" stroke-opacity="1" stroke="#000000" transform="translate(-25,15)"><path d="M0,0 L20,0 a0,0 0 0 1 0,0 L20,0 L20,0 L25,0 L20,10 L20,10 a0,0 0 0 1 -0,0 L0,10 a0,0 0 0 1 -0,-0 L0,0 a0,0 0 0 1 0,-0"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(-15,15)"><g transform="translate(0,5)" display="none"></g></g></g></g><g filter="url(#filter-id-104)" role="tooltip" visibility="hidden" opacity="0"><g fill="#ffffff" style="pointer-events: none;" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" transform="translate(6,0)"><path d="M3,0 L21,0 a3,3 0 0 1 3,3 L24,10 a3,3 0 0 1 -3,3 L3,13 a3,3 0 0 1 -3,-3 L0,10 L0,10 L-6,0 L0,0 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(18,0)"><g transform="translate(0,7)" display="none"></g></g></g></g><g filter="url(#filter-id-123)" role="tooltip" visibility="hidden" opacity="0"><g fill="#ffffff" style="pointer-events: none;" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" transform="translate(6,0)"><path d="M3,0 L21,0 a3,3 0 0 1 3,3 L24,10 a3,3 0 0 1 -3,3 L3,13 a3,3 0 0 1 -3,-3 L0,10 L0,10 L-6,0 L0,0 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(18,0)"><g transform="translate(0,7)" display="none"></g></g></g></g></g></g></g></g></svg></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="stats_slider" class="carousel slide slide_widget" data-ride="carousel" data-interval="4000">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card_title mb-0">
                                                <span class="heading_icon">
                                                    <img src="images/icon-bg.png" alt="Icon">
                                                    <i class="feather ft-shopping-bag"></i>
                                                </span>
                                                Sales</h4>
                                            <div class="btn-group border-0">
                                                <div class="vz_nav">
                                                    <a class="vz_nav-prev carousel-control-prev" href="#stats_slider" role="button" data-slide="prev">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                    <a class="vz_nav-next carousel-control-next" href="#stats_slider" role="button" data-slide="next">
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item carousel-item-next carousel-item-left">
                                                <h3 class="mb-0 font-weight-medium">$20 M</h3>
                                                <p class="text-muted">10% higher than previous month</p>
                                                <div class="slide_progress">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="font-weight-medium">Progress</h4>
                                                        <p class="mb-0 text-muted">50%</p>
                                                    </div>
                                                    <div class="progress progress-md">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">63% of your goals</small>
                                                </div>
                                            </div>

                                            <div class="carousel-item active carousel-item-left">
                                                <h3 class="mb-0 font-weight-medium">$500 K</h3>
                                                <p class="text-muted">5% higher than previous month</p>
                                                <div class="slide_progress">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="font-weight-medium">Progress</h4>
                                                        <p class="mb-0 text-muted">25%</p>
                                                    </div>
                                                    <div class="progress progress-md">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">63% of your goals</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="orders_slider" class="carousel slide slide_widget" data-ride="carousel" data-interval="4000">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card_title mb-0">
                                                <span class="heading_icon">
                                                    <img src="images/icon-bg.png" alt="Icon">
                                                    <i class="feather ft-archive"></i>
                                                </span>
                                                Orders</h4>
                                            <div class="btn-group border-0">
                                                <div class="vz_nav">
                                                    <a class="vz_nav-prev carousel-control-prev" href="#orders_slider" role="button" data-slide="prev">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                    <a class="vz_nav-next carousel-control-next" href="#orders_slider" role="button" data-slide="next">
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <h3 class="mb-0 font-weight-medium">100 K</h3>
                                                <p class="text-muted">10% higher than previous month</p>
                                                <div class="slide_progress">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="font-weight-medium">Progress</h4>
                                                        <p class="mb-0 text-muted">73%</p>
                                                    </div>
                                                    <div class="progress progress-md">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 73%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">63% of your goals</small>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <h3 class="mb-0 font-weight-medium">500 K</h3>
                                                <p class="text-muted">5% higher than previous month</p>
                                                <div class="slide_progress">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="font-weight-medium">Progress</h4>
                                                        <p class="mb-0 text-muted">61%</p>
                                                    </div>
                                                    <div class="progress progress-md">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 61%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">63% of your goals</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            





























            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card d-flex mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-price-tag-o"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Approved Earnings Balance</p>
                                <span><?php echo print_price($user->balance, $this->payment_settings->default_product_currency); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-wallet"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Wallet Balace</p>
                                <span><?php echo print_price($user->wallet, $this->payment_settings->default_product_currency); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-0 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-dashboard"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Total Products</p>
                                <span><?php echo get_user_products_count($user->slug); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>












            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-0 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-price-tag-o"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Visitors</p>
                                <span><?php echo $user->hit; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card d-flex mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-download"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Accumulated Traffics</p>
                                <span><?php echo $this->profile_model->get_user_traffics_count($user->id); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <i class="icon-user-plus"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Followers</p>
                                <span><?php echo get_followers_count($user->id); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>

                                </div>



</div>






            </div>
        </div>

    </div>
</div>
<!-- Wrapper End-->