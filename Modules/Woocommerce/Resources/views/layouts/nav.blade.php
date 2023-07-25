<section class="no-print">

<div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Wocommerce</h4>
                                </div>
                                <div class="card-body">
                             
                                    <ul class="nav">
                                        <li class="nav-item" @if(request()->segment(1) == 'woocommerce' && request()->segment(2) == 'view-sync-log') class="active" @endif><a href="{{action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@viewSyncLog')}}">
                                            <a class="nav-link active" href="{{action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@viewSyncLog')}}">@lang('woocommerce::lang.api_settings')</a>
                                        </li>
                                        @if (auth()->user()->can('woocommerce.access_woocommerce_api_settings'))
                                        <li class="nav-item" @if(request()->segment(1) == 'woocommerce' && request()->segment(2) == 'api-settings') class="active" @endif>
                                            <a class="nav-link" href="{{action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@apiSettings')}}">@lang('woocommerce::lang.api_settings')</a>
                                        </li>
                                        @endif
                                
                                    </ul>
                                </div>
                            </div>
                        </div>
</section>