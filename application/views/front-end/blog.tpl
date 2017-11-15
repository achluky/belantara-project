{extends file="front-end/blog_template.tpl"} 

{block name="content"}

    <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <!-- post content -->
                    <div class="content col-md-9">
                        <!-- Page title -->
                        <div class="page-title p-b-30">
                            <h1>Our Blog</h1>
                        </div>
                        <!-- end: Page title -->

                        <!-- Blog -->
                        <div id="blog">
                            
                            <div class="post-item p-b-30">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="http://belantara.or.id/wp-content/uploads/DSC_7771.jpg">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Nov 1, 2016</span>
                                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0 Comments</a></span>
                                        <h2><a href="{base_url()}blog/ipfest-2016">IPFEST 2016 – Promosi Program Yayasan Belantara pada Ajang Berbagi dan Menggalang Sinergi untuk Restorasi Bentang Alam</a></h2>
                                        <p>Indonesia Philanthropy Festival 2016 (IPFest 2016) memiliki tujuan salah satunya yaitu mempertemukan dan memfasilitasi terjadinya sinergi dan kemitraan di antara para pelaku filantropi dan organisasi pelaksana program khususnya dalam pencapaian target Tujuan Pembangunan Berkelanjutan (Sustainable Development Goals – SDGs).</p>
                                        <a href="{base_url()}blog/ipfest-2016" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>

                            <!-- Post item-->
                            <div class="post-item p-b-30">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="http://belantara.or.id/wp-content/uploads/Realising-A-New-Vision-for-the-LandscapeB_1200x798px.jpg">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Sept 25, 2015</span>
                                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0 Comments</a></span>
                                        <h2><a href="{base_url()}blog/realising-a-new-vision-for-the-landscape">Realising a new vision for the landscape</a></h2>
                                        <p>I have overseen a fair share of projects and programs throughout my 25 years working in environmental organisations dedicated to conserving Indonesia’s natural landscapes. </p>
                                        <a href="{base_url()}blog/realising-a-new-vision-for-the-landscape" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-item p-b-30">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="http://belantara.or.id/wp-content/uploads/Stakeholder-Consultation-on-Landscape-Conservation-Master-PlanB_1200x798px.jpg">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Sept 25, 2015</span>
                                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0 Comments</a></span>
                                        <h2><a href="{base_url()}blog/stakeholder-consultation-on-landscape-conservation-master-plan">Stakeholder Consultation on Landscape Conservation Master Plan</a></h2>
                                        <p>Although Indonesia only covers approximately 1.3% of the world’s total land mass, it is one of 17 of the world’s mostmegadiverse[1]countries,and so conservation projects to protect Indonesia’s forests have attracted the support ofmany civil society organizations and foreign governments.</p>
                                        <a href="{base_url()}blog/stakeholder-consultation-on-landscape-conservation-master-plan" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-item p-b-30">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="http://belantara.or.id/wp-content/uploads/Landscape-Approach-with-the-South-Sumatra-Government_1200x798px.jpg">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Sept 25, 2015</span>
                                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0 Comments</a></span>
                                        <h2><a href="{base_url()}blog/putting-the-belantara-vision-into-practice-implementing-a-multi-stakeholder-landscape-approachwith-the-south-sumatra-government">Putting the Belantara vision into practice: implementing a multi stakeholder landscape approach with the South Sumatra Government

</a></h2>
                                        <p>Landscape conservation is an incredibly complex issue. It is clear that the annual forest loss and degradation in Indonesia is a wider problem than any one stakeholder in the landscape can deal with, and it needs a far more imaginative, considered and collective strategy than has historically been the case.</p>
                                        <a href="{base_url()}blog/putting-the-belantara-vision-into-practice-implementing-a-multi-stakeholder-landscape-approachwith-the-south-sumatra-government" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            <!-- end: Post item-->
                        </div>
                        <!-- end: Blog -->
                        
                        <!-- Pagination
                        <div class="pagination pagination-simple">
                            <ul>
                                <li>
                                    <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left"></i></span> </a>
                                </li>
                                <li><a href="#">1</a> </li>
                                <li><a href="#">2</a> </li>
                                <li class="active"><a href="#">3</a> </li>
                                <li><a href="#">4</a> </li>
                                <li><a href="#">5</a> </li>
                                <li>
                                    <a href="#" aria-label="Next"> <span aria-hidden="true"><i class="fa fa-angle-right"></i></span> </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end: Pagination -->

                    </div>
                    <!-- end: post content -->
                

{/block}