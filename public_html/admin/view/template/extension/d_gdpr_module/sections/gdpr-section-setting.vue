<template id="tag-gdpr-section-setting">
    <form id="setting">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="#tab_setting_gdpr" data-toggle="tab" aria-expanded="false">
                            <i class="far fa-cog" aria-hidden="true"></i>
                            {{$t('tables.tab_gdpr_setting')}}
                        </a>
                    </li>
                    <li>
                        <a href="#tab_setting_gdpr_translate" data-toggle="tab" aria-expanded="false">
                            <i class="far fa-globe" aria-hidden="true"></i>
                            {{$t('tables.tab_gdpr_translate')}}
                        </a>
                    </li>
                    <li>
                        <a href="#tab_setting_gdpr_cookie" data-toggle="tab" aria-expanded="false">
                            <i class="far fa-cookie-bite" aria-hidden="true"></i>
                            {{$t('tables.tab_gdpr_cookie_setting')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="tab-content">
                    <div id="tab_setting_gdpr" class="tab-pane active">
                        <div class="page-header"><h3>{{$t('tables.tab_gdpr_setting')}}</h3></div>
                        <div class="form-group clearfix">
                            <gdpr-label code="status" for="input-status"></gdpr-label>
                            <div class="col-sm-6 col-lg-6">
                                <gdpr-switcher v-model-vuex="setting.status" id="input-status"/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <gdpr-label code="personal_data_download_expire"
                                        for="input-personal_data_download_expire"></gdpr-label>
                            <div class="col-sm-6 col-lg-6">
                                <input type="text" v-model-vuex="setting.setting.personal_data_download_expire"
                                       id="input-personal_data_download_expire" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <gdpr-label code="personal_data_remove_expire"
                                        for="input-personal_data_remove_expire"></gdpr-label>
                            <div class="col-sm-6 col-lg-6">
                                <input type="text" v-model-vuex="setting.setting.personal_data_remove_expire"
                                       id="input-personal_data_remove_expire" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-lg-3 control-label"
                                   v-html="$t('common.entry_support')"></label>
                            <div class="col-sm-6 col-lg-6">
                                <gdpr-support></gdpr-support>
                            </div>
                        </div>
                    </div>
                    <div id="tab_setting_gdpr_translate" class="tab-pane">
                        <div class="tab-body">
                            <div class="page-header"><h3>{{$t('tables.tab_gdpr_translate')}}</h3></div>
                            <ul class="nav nav-pills" id="translate-setting">
                                <li v-for="language in $o('setting.languages')">
                                    <a :href="'#tab_gdpr_translate_language_'+language.language_id" data-toggle="tab"
                                       aria-expanded="false">
                                        <img :src="language.flag"/>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div v-for="language in $o('setting.languages')"
                                     :id="'tab_gdpr_translate_language_'+language.language_id"
                                     class="tab-pane">
                                    <div class="form-group clearfix">
                                        <gdpr-label code="location_personal_data"></gdpr-label>
                                        <div class="col-sm-6 col-lg-6">
                                                <textarea
                                                        v-model-vuex="setting.setting.language[language.language_id].location_personal_information"
                                                        class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <gdpr-label code="physical_location_host"></gdpr-label>
                                        <div class="col-sm-6 col-lg-6">
                                            <textarea
                                                    v-model-vuex="setting.setting.language[language.language_id].physical_location_host"
                                                    class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab_setting_gdpr_cookie" class="tab-pane">
                        <div class="tab-body">
                            <div class="page-header"><h3>{{$t('tables.tab_gdpr_cookie_setting')}}</h3></div>
                            <div class="form-group clearfix">
                                <gdpr-label code="enable_cookies"></gdpr-label>
                                <div class="col-sm-6 col-lg-9">
                                    <gdpr-switcher v-model-vuex="setting.cookies.status"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="show_privacy_link"></gdpr-label>
                                <div class="col-sm-6 col-lg-9">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <gdpr-switcher v-model-vuex="setting.cookies.show_privacy_link"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="position"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <gdpr-select v-model-vuex="setting.cookies.position" :options="$o('setting.positions')"></gdpr-select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="banner_color"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <gdpr-color-picker v-model-vuex="setting.cookies.style.banner_color"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="banner_text_color"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <gdpr-color-picker v-model-vuex="setting.cookies.style.banner_text_color"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="button_color"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <gdpr-color-picker v-model-vuex="setting.cookies.style.button_color"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="button_text_color"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <gdpr-color-picker v-model-vuex="setting.cookies.style.button_text_color"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="message"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <input type="text" class="form-control"
                                           v-model-vuex="setting.cookies.content.message"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="dismiss"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <input type="text" class="form-control"
                                           v-model-vuex="setting.cookies.content.dismiss"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <gdpr-label code="text_link"></gdpr-label>
                                <div class="col-sm-6 col-lg-6">
                                    <input type="text" class="form-control"
                                           v-model-vuex="setting.cookies.content.link"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>