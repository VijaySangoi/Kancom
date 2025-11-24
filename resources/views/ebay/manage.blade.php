<x-layouts.app>
    <div id="disp">
    page under construction, ui might not work. data has been added via backend
        @if (count($stores) > 0)
            @foreach ($stores as $key => $value)
            
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
                    <div class="p-3 inline-flex">
                        <form id="{{$value->id}}_form" class="inline-flex">
                            @csrf
                            <x-forms.input hidden class="mx-2" label="" name="unique_id" value="{{$value->id}}"
                                labelClass="mx-2" />
                            <x-forms.input class="mx-2" label="Account Name" name="name" value="{{$value->store_name}}"
                                labelClass="p-2 mx-2 w-full " />
                            <x-forms.input class="mx-2" label="EBAY Client ID" name="client_id" value="{{$value->ebay_client_id}}"
                                labelClass="p-2 mx-2 w-full" />
                            <x-forms.input class="mx-2" type="password" label="EBAY Client Secret" name="client_secret" value="{{$value->ebay_client_secret}}"
                                labelClass="p-2 mx-2 w-full" />
                        </form>
                        <x-button class="mx-2 cred" data-id="{{$value->id}}_form" type="primary"><i class="fa fa-link" aria-hidden="true"></i></x-button>
                        <a class="bg-blue-600 hover:bg-blue-700 focus:ring-blue-500text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center mx-2 auth" href="https://auth.sandbox.ebay.com/oauth2/authorize?state={{$value->id}}&client_id={{$value->ebay_client_id}}&redirect_uri={{$value->ebay_redirect_uri}}&prompt=login&state&response_type=code&hd&consentGiven=false&sgfl=oath&AppName={{$value->ebay_client_id}}&scope={{ urlencode('https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/buy.order.readonly https://api.ebay.com/oauth/api_scope/buy.guest.order https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly https://api.ebay.com/oauth/api_scope/sell.marketplace.insights.readonly https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly https://api.ebay.com/oauth/api_scope/buy.shopping.cart https://api.ebay.com/oauth/api_scope/buy.offer.auction https://api.ebay.com/oauth/api_scope/commerce.identity.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.email.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.phone.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.address.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.name.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.status.readonly https://api.ebay.com/oauth/api_scope/sell.finances https://api.ebay.com/oauth/api_scope/sell.payment.dispute https://api.ebay.com/oauth/api_scope/sell.item.draft https://api.ebay.com/oauth/api_scope/sell.item https://api.ebay.com/oauth/api_scope/sell.reputation https://api.ebay.com/oauth/api_scope/sell.reputation.readonly https://api.ebay.com/oauth/api_scope/commerce.notification.subscription https://api.ebay.com/oauth/api_scope/commerce.notification.subscription.readonly https://api.ebay.com/oauth/api_scope/sell.stores https://api.ebay.com/oauth/api_scope/sell.stores.readonly https://api.ebay.com/oauth/api_scope/commerce.vero') }}" data-id="{{$value->id}}_form" type="primary"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                        <x-button class="mx-2 save" data-id="{{$value->id}}_form" type="primary"><i class="fa fa-envelope" aria-hidden="true"></i></x-button>
                        <x-button class="mx-2 delete" data-id="{{$value->id}}_form" type="primary"><i class="fa fa-trash" aria-hidden="true"></i></x-button>
                    </div>
                </div>
            @endforeach
        @endif
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-3 inline-flex">
                <form id="new_form" class="inline-flex">
                    @csrf
                    <x-forms.input hidden class="mx-2" label="" name="unique_id" value=""
                        labelClass="mx-2" />
                    <x-forms.input class="mx-2" label="Account Name" name="name" value=""
                        labelClass="p-2 mx-2 w-full" />
                    <x-forms.input class="mx-2" label="EBAY Client ID" name="client_id" value=""
                        labelClass="p-2 mx-2 w-full" />
                    <x-forms.input class="mx-2" label="EBAY Client Secret" name="client_secret" value=""
                        labelClass="p-2 mx-2 w-full" />
                </form>
                <x-button data-id="new_form" class="mx-2 cred" type="primary" disabled><i class="fa fa-link" aria-hidden="true"></i></x-button>
                <x-button data-id="new_form" class="mx-2 auth" type="primary" disabled><i class="fa fa-external-link" aria-hidden="true"></i></x-button>
                <x-button data-id="new_form" class="mx-2 save" type="primary"><i class="fa fa-envelope" aria-hidden="true"></i></x-button>
                <x-button data-id="new_form" class="mx-2 delete" type="primary" disabled><i class="fa fa-trash" aria-hidden="true"></i></x-button>
            </div>
        </div>
    </div>
    <div>
        <x-button id="add" class="mx-2" type="primary">{{ __('+') }}</x-button>
    </div>
    <script>
        $("#add").click((e) => {
            var txt = `<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-3 inline-flex">
                <form id="new_form" class="inline-flex">
                    @csrf
                    <x-forms.input hidden class="mx-2" label="" name="unique_id" value=""
                        labelClass="mx-2" />
                    <x-forms.input class="mx-2" label="Account Name" name="name" value=""
                        labelClass="p-2 mx-2 w-full py-4" />
                    <x-forms.input class="mx-2" label="EBAY Client ID" name="client_id" value=""
                        labelClass="p-2 mx-2 w-full py-4" />
                    <x-forms.input class="mx-2" label="EBAY Client Secret" name="client_secret" value=""
                        labelClass="p-2 mx-2 w-full py-4" />
                </form>
                <x-button data-id="new_form" class="mx-2 cred" type="primary">{{ __('get_credential_code') }}</x-button>
                <x-button data-id="new_form" class="mx-2 auth" type="primary">{{ __('get_authorization_code') }}</x-button>
                <x-button data-id="new_form" class="mx-2 save" type="primary">{{ __('Save') }}</x-button>
                <x-button data-id="new_form" class="mx-2 delete" type="primary">{{ __('Delete') }}</x-button>
            </div>
        </div>`;
            $("#disp").append(txt);
        });

        $(".save").click((e)=>{
            console.log($(this).attr('class'));
        });
    </script>
</x-layouts.app>
