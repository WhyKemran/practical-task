{if
    ($runtime.company_id && "ULTIMATE"|fn_allowed_for || "MULTIVENDOR"|fn_allowed_for)
    && $addons.product_reviews.status !== "ObjectStatuses::ACTIVE"|enum
}
    {include file="common/subheader.tpl" title=__("comments_and_reviews") target="#discussion_product_setting"}
    <div id="discussion_product_setting" class="in collapse">
    	<fieldset>
			{$no_hide_input = false}
			{if "ULTIMATE"|fn_allowed_for}
				{$no_hide_input = true}
			{/if}

            {include file="addons/discussion/views/discussion_manager/components/allow_discussion.tpl"
                prefix="product_data"
                object_id=$product_data.product_id
                object_type="Addons\\Discussion\\DiscussionObjectTypes::PRODUCT"|enum
                title=__("discussion_title_product")
                no_hide_input=$no_hide_input
                discussion_default_type=$addons.discussion.product_discussion_type
            }
    	</fieldset>
    </div>
{/if}