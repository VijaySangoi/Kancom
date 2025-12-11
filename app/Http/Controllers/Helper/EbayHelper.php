<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\ProductUpdateStatus as PUS;
use Illuminate\Http\Request;

class EbayHelper extends Controller
{
    public static function getToken($url, $fields)
    {
        $gravy = base64_encode(config('ebay.client_id') . ":" . config('ebay.client_secret'));
        $header = array('Authorization: Basic ' . $gravy, 'Content-Type: application/x-www-form-urlencoded');
        $res = ApiHelper::api($url, 'POST', $header, $fields);
        $res = json_decode($res);
        return $res;
    }
    public static function getClientCred()
    {
        $url = 'https://api.sandbox.ebay.com/identity/v1/oauth2/token';
        $cred_type = 'client_credentials';
        $scopes = urlencode('https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/buy.order.readonly https://api.ebay.com/oauth/api_scope/buy.guest.order https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly https://api.ebay.com/oauth/api_scope/sell.marketplace.insights.readonly https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly https://api.ebay.com/oauth/api_scope/buy.shopping.cart https://api.ebay.com/oauth/api_scope/buy.offer.auction https://api.ebay.com/oauth/api_scope/commerce.identity.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.email.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.phone.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.address.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.name.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.status.readonly https://api.ebay.com/oauth/api_scope/sell.finances https://api.ebay.com/oauth/api_scope/sell.payment.dispute https://api.ebay.com/oauth/api_scope/sell.item.draft https://api.ebay.com/oauth/api_scope/sell.item https://api.ebay.com/oauth/api_scope/sell.reputation https://api.ebay.com/oauth/api_scope/sell.reputation.readonly https://api.ebay.com/oauth/api_scope/commerce.notification.subscription https://api.ebay.com/oauth/api_scope/commerce.notification.subscription.readonly https://api.ebay.com/oauth/api_scope/sell.stores https://api.ebay.com/oauth/api_scope/sell.stores.readonly https://api.ebay.com/oauth/api_scope/commerce.vero');
        $fields = 'grant_type=' . $cred_type . '&scope=' . $scopes;
        $res = self::getToken($url, $fields);
        return $res;
    }
    public static function refreshToken($token)
    {
        $url = 'https://api.sandbox.ebay.com/identity/v1/oauth2/token';
        $grant_type = 'refresh_token';
        $scopes = urlencode('https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/buy.order.readonly https://api.ebay.com/oauth/api_scope/buy.guest.order https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly https://api.ebay.com/oauth/api_scope/sell.marketplace.insights.readonly https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly https://api.ebay.com/oauth/api_scope/buy.shopping.cart https://api.ebay.com/oauth/api_scope/buy.offer.auction https://api.ebay.com/oauth/api_scope/commerce.identity.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.email.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.phone.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.address.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.name.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.status.readonly https://api.ebay.com/oauth/api_scope/sell.finances https://api.ebay.com/oauth/api_scope/sell.payment.dispute https://api.ebay.com/oauth/api_scope/sell.item.draft https://api.ebay.com/oauth/api_scope/sell.item https://api.ebay.com/oauth/api_scope/sell.reputation https://api.ebay.com/oauth/api_scope/sell.reputation.readonly https://api.ebay.com/oauth/api_scope/commerce.notification.subscription https://api.ebay.com/oauth/api_scope/commerce.notification.subscription.readonly https://api.ebay.com/oauth/api_scope/sell.stores https://api.ebay.com/oauth/api_scope/sell.stores.readonly https://api.ebay.com/oauth/api_scope/commerce.vero');
        $fields = 'grant_type=' . $grant_type . '&scope=' . $scopes . '&refresh_token=' . $token;
        $res = self::getToken($url, $fields);
        return $res;
    }
    public static function getAccessToken($code,$uri)
    {
        $url = 'https://api.sandbox.ebay.com/identity/v1/oauth2/token';
        $grant_type = 'authorization_code';
        $fields = 'grant_type=' . $grant_type . '&redirect_uri=' . $uri . '&code=' . $code;
        $res = self::getToken($url, $fields);
        return $res;
    }
    public static function getItems($token)
    {
        $url = 'https://api.sandbox.ebay.com/sell/inventory/v1/inventory_item';
        $method = 'GET';
        $header = array('Authorization:Bearer ' . $token, 'Accept:application/json');
        $fields = '?limit=20&offset=0';
        $res = ApiHelper::api($url, $method, $header, $fields);
        $res = json_decode($res);
        return $res;
    }
    public static function bulkCreateOrReplaceInventory($token, array $product_id)
    {
        $url = 'https://api.sandbox.ebay.com/sell/inventory/v1/bulk_create_or_replace_inventory_item';
        $method = 'POST';
        $header = array('Authorization:Bearer ' . $token, 'Accept:application/json', 'Content-Type:application/json');
        
        $fields = '{ "requests": [';
        foreach($product_id as $index => $pid)
        {
            if($index > 0)
            {
                $fields .= ',';
            }
            $fields .= self::pack_product($pid)."" ;
        }
         $fields .= '
            ]
        }';
        $res = ApiHelper::api($url, $method, $header, $fields);
        $res = json_decode($res);
        self::log_status($res,'create_inventory');
        return $res;
    }
    public static function bulk_create_offer($token, array $product_id)
    {
        $url = 'https://api.sandbox.ebay.com/sell/inventory/v1/bulk_create_offer';
        $method = 'POST';
        $header = array('Authorization:Bearer ' . $token, 'Accept:application/json', 'Content-Type:application/json');
        
        $fields = '{ "requests": [';
        foreach($product_id as $index => $pid)
        {
            if($index > 0)
            {
                $fields .= ',';
            }
            $fields .= self::post_offer($pid)."" ;
        }
         $fields .= '
            ]
        }';
        $res = ApiHelper::api($url, $method, $header, $fields);
        $res = json_decode($res);
        self::log_status($res,'create_offer');
        return $res;
    }
    public static function pack_product($id)
    {
        $product = DB::table('products')
            ->select('*')
            ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->leftJoin('distributors', 'distributors.id', '=', 'products.distributor_id')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('conditions', 'conditions.id', '=', 'products.condition')
            ->where('products.id', '=', $id)
            ->first();
        $country = $product->country ?? 'INDIA';
        $pack = '{
            "sku":"' . $product->sku . '",
                "locale":"en_US",
                "product":{
                    "title":"' . $product->title . '",
                    "aspects":{
                        "Country/Region of Manufacture":[
                        "' . $country . '"
                        ]
                    },
                    "description":"' . $product->description . '",
                    "imageUrls":[
                    "' . str_replace(',', '","', $product->imageUrls) . '"
                    ]
                },
                "condition":"' . $product->condition . '",
                "conditionDescription":"' . $product->conditionDescription . '",
                "availability":{
                    "shipToLocationAvailability":{
                        "quantity":' . $product->quantity . '
                    }
                }
            }';
        return $pack;
    }
    private static function log_status($responses,$func)
    {
        foreach($responses->responses as $index => $response)
        {
            $log = new PUS();
            $log->func = $func;
            $log->status_code = $response->statusCode;
            $log->sku = $response->sku;
            $log->locale = $response->locale;
            $log->warnings = json_encode($response->warnings);
            $log->errors = json_encode($response->errors);
            $log->save();
        }
    }
    public static function post_offer($id)
    {
        $product = DB::table('products')
            ->select('*')
            ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->leftJoin('distributors', 'distributors.id', '=', 'products.distributor_id')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('conditions', 'conditions.id', '=', 'products.condition')
            ->where('products.id', '=', $id)
            ->first();
        $offer = `{
            "sku": "' . $product->sku . '",
            "secondaryCategoryId": "237",
            "requests": [
                {
                "availableQuantity": "' . $product->quantity . '",
                "categoryId": "237",
                "charity": {
                    "charityId": "none",
                    "donationPercentage": "0"
                },
                "extendedProducerResponsibility": {
                    "ecoParticipationFee": {
                    "currency": "INR",
                    "value": "0"
                    },
                    "producerProductId": "string",
                    "productDocumentationId": "string",
                    "productPackageId": "string",
                    "shipmentPackageId": "string"
                },
                "format": "FIXED_PRICE",
                "hideBuyerDetails": "false",
                "includeCatalogProductDetails": "true",
                "listingDescription": "' . $product->description . '",
                "listingDuration": "DAYS_5",
                "listingPolicies": {
                    "bestOfferTerms": {
                    "autoAcceptPrice": {
                        "currency": "INR",
                        "value": "' . $product->wholesale_price . '"
                    },
                    "autoDeclinePrice": {
                        "currency": "INR",
                        "value": "' . $product->wholesale_price - 1 . '"
                    },
                    "bestOfferEnabled": "false"
                    },
                    "eBayPlusIfEligible": "false",
                    "fulfillmentPolicyId": "235",
                    "paymentPolicyId": "201",
                    "productCompliancePolicyIds": [
                    "201"
                    ],
                    "regionalProductCompliancePolicies": {
                    "countryPolicies": [
                        {
                        "country": "IN",
                        "policyIds": [
                            "201"
                        ]
                        }
                    ]
                    },
                    "regionalTakeBackPolicies": {
                    "countryPolicies": [
                        {
                        "country": "IN",
                        "policyIds": [
                            "201"
                        ]
                        }
                    ]
                    },
                    "returnPolicyId": "201",
                    "shippingCostOverrides": [
                    {
                        "additionalShippingCost": {
                        "currency": "INR",
                        "value": "' . $product->extra_charges . '"
                        },
                        "priority": "2",
                        "shippingCost": {
                        "currency": "INR",
                        "value": "' . $product->extra_charges . '"
                        },
                        "shippingServiceType": "DOMESTIC",
                        "surcharge": {
                        "currency": "INR",
                        "value": "' . $product->extra_charges . '"
                        }
                    }
                    ],
                    "takeBackPolicyId": "201"
                },
                "listingStartDate": "2025-12-11",
                "lotSize": "5",
                "marketplaceId": "EBAY_IN",
                "merchantLocationKey": "",
                "pricingSummary": {
                    "minimumAdvertisedPrice": {
                    "currency": "INR",
                    "value": "' . $product->total_price . '"
                    },
                    "originallySoldForRetailPriceOn": "ON_EBAY",
                    "originalRetailPrice": {
                    "currency": "INR",
                    "value": "' . $product->total_price . '"
                    },
                    "price": {
                    "currency": "INR",
                    "value": "' . $product->total_price . '"
                    },
                    "pricingVisibility": "PRE_CHECKOUT"
                },
                "quantityLimitPerBuyer": "5",
                "regulatory": {
                    "manufacturer": {
                    "addressLine1": "string",
                    "addressLine2": "string",
                    "city": "string",
                    "companyName": "string",
                    "contactUrl": "string",
                    "country": "IN",
                    "email": "string",
                    "phone": "string",
                    "postalCode": "string",
                    "stateOrProvince": "string"
                    },
                    "productSafety": {
                    "component": "string",
                    "pictograms": [
                        "string"
                    ],
                    "statements": [
                        "string"
                    ]
                    },
                    "responsiblePersons": [
                    {
                        "addressLine1": "string",
                        "addressLine2": "string",
                        "city": "string",
                        "companyName": "string",
                        "contactUrl": "string",
                        "country": "IN",
                        "email": "string",
                        "phone": "string",
                        "postalCode": "string",
                        "stateOrProvince": "string",
                        "types": [
                        "EU_RESPONSIBLE_PERSON"
                        ]
                    }
                    ]
                },
                "storeCategoryNames": [
                    "Dolls & Bears"
                ],
                "tax": {
                    "applyTax": "true",
                    "thirdPartyTaxCategory": "none",
                    "vatPercentage": "12"
                }
                }
            ]
            }`;
            return $offer;
    }
}