<div id="product_features_{$block.block_id}">
<div class="ty-feature">
    {if $department_data.main_pair}
    <div class="ty-feature__image">
        {include file="common/image.tpl" 
        images=$department_data.main_pair
        image_width=$settings.Thumbnails.product_lists_thumbnail_width 
        image_height=$settings.Thumbnails.product_lists_thumbnail_height }
    </div>
    {/if}
    <div class="ty-feature__description ty-wysiwyg-content">
        {if $department_data.url}
        <p><a href="{$department_data.url}">{$department_data.url}</a></p>
        {/if}
        {$department_data.description nofilter}
    </div>
</div>

<div>
    <h2>Руководитель:</h2>
        {if $supervisor}

            <div class="ty-grid-list__item ty-quick-view-button__wrapper ">
                <div class="ty-grid-list__item-name"><bdi>            
                    <label><strong>Сотрудник:</strong> {$supervisor.firstname} {$supervisor.lastname}</label><br><br> 
                    <label><strong>Email:</strong> {$supervisor.email}</label><br><br>
                    <label><strong>Телефон:</strong> {$supervisor.phone}</label> 
                </bdi></div>
            </div>

        {/if}
    
    
</div>

<div>
    <h2>Сотрудники:</h2>
        {if $members}
            {foreach $members as $member}
                    <div class="ty-grid-list__item ty-quick-view-button__wrapper ">
                        <div class="ty-grid-list__item-name"><bdi>            
                            <label><strong>Сотрудник:</strong> {$member.firstname} {$member.lastname}</label><br><br> 
                            <label><strong>Email:</strong> {$member.email}</label><br><br>
                            <label><strong>Телефон:</strong> {$member.phone}</label> 
                        </bdi></div>
                    </div>
            {/foreach}
        {else}
            <p class="ty-no-items">В этом отделе нет сотрудников</p>
        {/if}
    
    
</div>
<!--product_features_{$block.block_id}--></div>
{capture name="mainbox_title"}{$department_data.department nofilter}{/capture}

