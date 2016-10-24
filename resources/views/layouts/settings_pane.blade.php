<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/6 0006
 * Time: 15:21
 */?>
<div class="settings-pane">

    <a href="#" data-toggle="settings-pane" data-animate="true">
        &times;
    </a>

    <div class="settings-pane-inner">

        <div class="row">

            <div class="col-md-4">

                <div class="user-info">

                    <div class="user-image">
                        <a href="extra-profile.html">
                            <img src="@if(!$userSelf->avatar){{ asset('assets/images/user-4.png') }}@else{{ asset($userSelf->avatar) }}@endif" class="img-responsive img-circle" />
                        </a>
                    </div>

                    <div class="user-details">

                        <h3>
                            <a href="extra-profile.html">{{ $userSelf->name }}</a>

                            <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                            <span class="user-status is-online"></span>
                        </h3>

                        <p class="user-title">{{ $userSelf->position }}</p>

                        <div class="user-links">
                            <a href="{{ url('admin/profile') }}" class="btn btn-primary">编辑资料</a>
                            {{--<a href="#" class="btn btn-success">升级</a>--}}
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-8 link-blocks-env">

                <div class="links-block left-sep">
                    <h4>
                        <span>个人资料</span>
                    </h4>

                    <ul class="list-unstyled">
                        <li>
                            <label for="sp-chk1">{{ $userSelf->position }}</label>
                        </li>
                        <li>
                            <label for="sp-chk3">{{ $userSelf->birthday }}</label>
                        </li>
                        <li>
                            <label for="sp-chk2">{{ $userSelf->company }}</label>
                        </li>
                        <li>
                            <label for="sp-chk3">{{ $userSelf->autograph }}</label>
                        </li>
                    </ul>
                </div>

                <div class="links-block left-sep">
                    <h4>
                        <a href="http://{{ $userSelf->url }}">
                            <span>联系方式</span>
                        </a>
                    </h4>

                    <ul class="list-unstyled">
                        <li>
                            <a href="http://{{ $userSelf->url }}">
                                <i class="fa-angle-right"></i>
                                个人网站
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                QQ：{{ $userSelf->qq }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                大学：{{ $userSelf->university }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                公司：{{ $userSelf->company }}
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

</div>
