<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection stock
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection products
     * @property Grid\Column|Collection articles
     * @property Grid\Column|Collection banners
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection depth
     * @property Grid\Column|Collection article_id
     * @property Grid\Column|Collection site_id
     * @property Grid\Column|Collection category_id
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection banner_id
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection product_sku_id
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection subject
     * @property Grid\Column|Collection message
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection about
     * @property Grid\Column|Collection photo
     * @property Grid\Column|Collection logo
     * @property Grid\Column|Collection order_id
     * @property Grid\Column|Collection product_id
     * @property Grid\Column|Collection rating
     * @property Grid\Column|Collection review
     * @property Grid\Column|Collection reviewed_at
     * @property Grid\Column|Collection no
     * @property Grid\Column|Collection total_amount
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection paid_at
     * @property Grid\Column|Collection payment_method
     * @property Grid\Column|Collection payment_no
     * @property Grid\Column|Collection refund_status
     * @property Grid\Column|Collection refund_no
     * @property Grid\Column|Collection closed
     * @property Grid\Column|Collection reviewed
     * @property Grid\Column|Collection ship_status
     * @property Grid\Column|Collection ship_data
     * @property Grid\Column|Collection extra
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection is_directory
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection on_sale
     * @property Grid\Column|Collection sold_count
     * @property Grid\Column|Collection review_count
     * @property Grid\Column|Collection domain
     * @property Grid\Column|Collection license_id
     * @property Grid\Column|Collection product_ids
     * @property Grid\Column|Collection article_ids
     * @property Grid\Column|Collection mail_id
     * @property Grid\Column|Collection banner_ids
     * @property Grid\Column|Collection process_status
     * @property Grid\Column|Collection country
     * @property Grid\Column|Collection province
     * @property Grid\Column|Collection city
     * @property Grid\Column|Collection district
     * @property Grid\Column|Collection zip
     * @property Grid\Column|Collection first_name
     * @property Grid\Column|Collection last_name
     * @property Grid\Column|Collection phone
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection birthdate
     * @property Grid\Column|Collection gender
     *
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection stock(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection products(string $label = null)
     * @method Grid\Column|Collection articles(string $label = null)
     * @method Grid\Column|Collection banners(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection depth(string $label = null)
     * @method Grid\Column|Collection article_id(string $label = null)
     * @method Grid\Column|Collection site_id(string $label = null)
     * @method Grid\Column|Collection category_id(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection banner_id(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection product_sku_id(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection subject(string $label = null)
     * @method Grid\Column|Collection message(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection about(string $label = null)
     * @method Grid\Column|Collection photo(string $label = null)
     * @method Grid\Column|Collection logo(string $label = null)
     * @method Grid\Column|Collection order_id(string $label = null)
     * @method Grid\Column|Collection product_id(string $label = null)
     * @method Grid\Column|Collection rating(string $label = null)
     * @method Grid\Column|Collection review(string $label = null)
     * @method Grid\Column|Collection reviewed_at(string $label = null)
     * @method Grid\Column|Collection no(string $label = null)
     * @method Grid\Column|Collection total_amount(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection paid_at(string $label = null)
     * @method Grid\Column|Collection payment_method(string $label = null)
     * @method Grid\Column|Collection payment_no(string $label = null)
     * @method Grid\Column|Collection refund_status(string $label = null)
     * @method Grid\Column|Collection refund_no(string $label = null)
     * @method Grid\Column|Collection closed(string $label = null)
     * @method Grid\Column|Collection reviewed(string $label = null)
     * @method Grid\Column|Collection ship_status(string $label = null)
     * @method Grid\Column|Collection ship_data(string $label = null)
     * @method Grid\Column|Collection extra(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection is_directory(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection on_sale(string $label = null)
     * @method Grid\Column|Collection sold_count(string $label = null)
     * @method Grid\Column|Collection review_count(string $label = null)
     * @method Grid\Column|Collection domain(string $label = null)
     * @method Grid\Column|Collection license_id(string $label = null)
     * @method Grid\Column|Collection product_ids(string $label = null)
     * @method Grid\Column|Collection article_ids(string $label = null)
     * @method Grid\Column|Collection mail_id(string $label = null)
     * @method Grid\Column|Collection banner_ids(string $label = null)
     * @method Grid\Column|Collection process_status(string $label = null)
     * @method Grid\Column|Collection country(string $label = null)
     * @method Grid\Column|Collection province(string $label = null)
     * @method Grid\Column|Collection city(string $label = null)
     * @method Grid\Column|Collection district(string $label = null)
     * @method Grid\Column|Collection zip(string $label = null)
     * @method Grid\Column|Collection first_name(string $label = null)
     * @method Grid\Column|Collection last_name(string $label = null)
     * @method Grid\Column|Collection phone(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection birthdate(string $label = null)
     * @method Grid\Column|Collection gender(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection price
     * @property Show\Field|Collection stock
     * @property Show\Field|Collection order
     * @property Show\Field|Collection products
     * @property Show\Field|Collection articles
     * @property Show\Field|Collection banners
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection depth
     * @property Show\Field|Collection article_id
     * @property Show\Field|Collection site_id
     * @property Show\Field|Collection category_id
     * @property Show\Field|Collection content
     * @property Show\Field|Collection banner_id
     * @property Show\Field|Collection image
     * @property Show\Field|Collection product_sku_id
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection email
     * @property Show\Field|Collection subject
     * @property Show\Field|Collection message
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection address
     * @property Show\Field|Collection about
     * @property Show\Field|Collection photo
     * @property Show\Field|Collection logo
     * @property Show\Field|Collection order_id
     * @property Show\Field|Collection product_id
     * @property Show\Field|Collection rating
     * @property Show\Field|Collection review
     * @property Show\Field|Collection reviewed_at
     * @property Show\Field|Collection no
     * @property Show\Field|Collection total_amount
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection paid_at
     * @property Show\Field|Collection payment_method
     * @property Show\Field|Collection payment_no
     * @property Show\Field|Collection refund_status
     * @property Show\Field|Collection refund_no
     * @property Show\Field|Collection closed
     * @property Show\Field|Collection reviewed
     * @property Show\Field|Collection ship_status
     * @property Show\Field|Collection ship_data
     * @property Show\Field|Collection extra
     * @property Show\Field|Collection token
     * @property Show\Field|Collection is_directory
     * @property Show\Field|Collection path
     * @property Show\Field|Collection on_sale
     * @property Show\Field|Collection sold_count
     * @property Show\Field|Collection review_count
     * @property Show\Field|Collection domain
     * @property Show\Field|Collection license_id
     * @property Show\Field|Collection product_ids
     * @property Show\Field|Collection article_ids
     * @property Show\Field|Collection mail_id
     * @property Show\Field|Collection banner_ids
     * @property Show\Field|Collection process_status
     * @property Show\Field|Collection country
     * @property Show\Field|Collection province
     * @property Show\Field|Collection city
     * @property Show\Field|Collection district
     * @property Show\Field|Collection zip
     * @property Show\Field|Collection first_name
     * @property Show\Field|Collection last_name
     * @property Show\Field|Collection phone
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection birthdate
     * @property Show\Field|Collection gender
     *
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection stock(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection products(string $label = null)
     * @method Show\Field|Collection articles(string $label = null)
     * @method Show\Field|Collection banners(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection depth(string $label = null)
     * @method Show\Field|Collection article_id(string $label = null)
     * @method Show\Field|Collection site_id(string $label = null)
     * @method Show\Field|Collection category_id(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection banner_id(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection product_sku_id(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection subject(string $label = null)
     * @method Show\Field|Collection message(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection about(string $label = null)
     * @method Show\Field|Collection photo(string $label = null)
     * @method Show\Field|Collection logo(string $label = null)
     * @method Show\Field|Collection order_id(string $label = null)
     * @method Show\Field|Collection product_id(string $label = null)
     * @method Show\Field|Collection rating(string $label = null)
     * @method Show\Field|Collection review(string $label = null)
     * @method Show\Field|Collection reviewed_at(string $label = null)
     * @method Show\Field|Collection no(string $label = null)
     * @method Show\Field|Collection total_amount(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection paid_at(string $label = null)
     * @method Show\Field|Collection payment_method(string $label = null)
     * @method Show\Field|Collection payment_no(string $label = null)
     * @method Show\Field|Collection refund_status(string $label = null)
     * @method Show\Field|Collection refund_no(string $label = null)
     * @method Show\Field|Collection closed(string $label = null)
     * @method Show\Field|Collection reviewed(string $label = null)
     * @method Show\Field|Collection ship_status(string $label = null)
     * @method Show\Field|Collection ship_data(string $label = null)
     * @method Show\Field|Collection extra(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection is_directory(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection on_sale(string $label = null)
     * @method Show\Field|Collection sold_count(string $label = null)
     * @method Show\Field|Collection review_count(string $label = null)
     * @method Show\Field|Collection domain(string $label = null)
     * @method Show\Field|Collection license_id(string $label = null)
     * @method Show\Field|Collection product_ids(string $label = null)
     * @method Show\Field|Collection article_ids(string $label = null)
     * @method Show\Field|Collection mail_id(string $label = null)
     * @method Show\Field|Collection banner_ids(string $label = null)
     * @method Show\Field|Collection process_status(string $label = null)
     * @method Show\Field|Collection country(string $label = null)
     * @method Show\Field|Collection province(string $label = null)
     * @method Show\Field|Collection city(string $label = null)
     * @method Show\Field|Collection district(string $label = null)
     * @method Show\Field|Collection zip(string $label = null)
     * @method Show\Field|Collection first_name(string $label = null)
     * @method Show\Field|Collection last_name(string $label = null)
     * @method Show\Field|Collection phone(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection birthdate(string $label = null)
     * @method Show\Field|Collection gender(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
