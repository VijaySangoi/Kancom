<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EbayScope;

class EbayScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EbayScope::insert([
            [
            'url' => 'https://api.ebay.com/oauth/api_scope',
            'description' => 'View public data from eBay',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.guest.order',
            'description' => 'Purchase eBay items off eBay',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.item.feed',
            'description' => 'View curated feeds of eBay items',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.marketing',
            'description' => 'Retrieve eBay product and listing data for use in marketing merchandise to buyers',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.product.feed',
            'description' => 'This scope would allow applications to access product feeds.',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.marketplace.insights',
            'description' => 'View historical sales data to help buyers make informed purchasing decisions',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.proxy.guest.order',
            'description' => 'Purchase eBay items anywhere, using an external vault for PCI compliance',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.item.bulk',
            'description' => 'Retrieve eBay items in bulk.',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.deal',
            'description' => 'View eBay sale events and deals.',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.deal',
            'description' => 'View eBay sale events and deals.',
            'type' => 0
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope',
            'description' => 'View public data from eBay',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.order.readonly',
            'description' => 'View your order details',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.guest.order',
            'description' => 'Purchase eBay items off eBay',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.marketing.readonly',
            'description' => 'View your eBay marketing activities, such as ad campaigns and listing promotions',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.marketing',
            'description' => 'View and manage your eBay marketing activities, such as ad campaigns and listing promotions',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.inventory.readonly',
            'description' => 'View your inventory and offers',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.inventory',
            'description' => 'View and manage your inventory and offers',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.account.readonly',
            'description' => 'View your account settings',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.account',
            'description' => 'View and manage your account settings',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly',
            'description' => 'View your order fulfillments',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.fulfillment',
            'description' => 'View and manage your order fulfillments',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.analytics.readonly',
            'description' => 'View your selling analytics data, such as performance reports',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.marketplace.insights.readonly',
            'description' => 'This scope would allow signed in users read only access to marketplace insights.',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly',
            'description' => 'This scope would allow signed in user to read catalog data.',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.shopping.cart',
            'description' => 'This scope would allow signed in user to access shopping carts',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/buy.offer.auction',
            'description' => 'View and manage bidding activities for auctions',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.identity.readonly',
            'description' => 'View a user\'s basic information, such as username or business account details, from their eBay member account',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.identity.email.readonly',
            'description' => 'View a user\'s personal email information from their eBay member account',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.identity.phone.readonly',
            'description' => 'View a user\'s personal telephone information from their eBay member account',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.identity.address.readonly',
            'description' => 'View a user\'s personal address information from their eBay member account',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.identity.name.readonly',
            'description' => 'View a user\'s first and last name from their eBay member account',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.identity.status.readonly',
            'description' => 'View a user\'s eBay member account status',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.finances',
            'description' => 'View and manage your payment and order information to display this information to you and allow you to initiate refunds using the third party application',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.payment.dispute',
            'description' => 'View and manage disputes and related details (including payment and order information).',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.item.draft',
            'description' => 'View and manage your item drafts.',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.item',
            'description' => 'View and manage your item information.',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.reputation',
            'description' => 'View and manage your reputation data, such as feedback.',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.reputation.readonly',
            'description' => 'View your reputation data, such as feedback.',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription',
            'description' => 'View and manage your event notification subscriptions',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription.readonly',
            'description' => 'View your event notification subscriptions',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.stores',
            'description' => 'View and manage eBay stores',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/sell.stores.readonly',
            'description' => 'View eBay stores',
            'type' => 1
            ],
            [
            'url' => 'https://api.ebay.com/oauth/api_scope/commerce.vero',
            'description' => 'Allows access to APIs that are related to eBay\'s Verified Rights Owner (VeRO) program.',
            'type' => 1
            ]
        ]);
    }
}
