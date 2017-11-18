{extends file="front-end/blog_template.tpl"} 

{block name="content"}
    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="content col-md-9">
                    <!-- Blog -->
                    <div id="blog" class="single-post">
                        <!-- Post single item-->
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="#">
                                        <img alt="Blog Belantara" src="{base_url()}document/images/blog/{$data.blog_detail->image}">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2>
                                    {$data.blog_detail->judul}
                                    </h2>
                                    <div class="post-meta">

                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Sept 25, 2015</span>
                                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0 Comments</a></span>
                                    </div>
                                    {$data.blog_detail->isi}
                                </div>
                                <!-- end: Comments -->
                                <div class="respond-form" id="respond">
                                    <div class="respond-comment">
                                        Leave a <span>Comment</span></div>
                                    <form class="form-gray-fields">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="upper" for="name">Name</label>
                                                    <input class="form-control required" name="senderName" placeholder="Enter name" id="name" aria-required="true" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="upper" for="email">Email</label>
                                                    <input class="form-control required email" name="senderEmail" placeholder="Enter email" id="email" aria-required="true" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="upper" for="website">Website</label>
                                                    <input class="form-control website" name="senderWebsite" placeholder="Enter Website" id="website" aria-required="false" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="upper" for="comment">Your comment</label>
                                                    <textarea class="form-control required" name="comment" rows="9" placeholder="Enter comment" id="comment" aria-required="true"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <button class="btn" type="submit">Submit Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post single item-->
                    </div>
                </div>
                <!-- end: content -->
{/block}