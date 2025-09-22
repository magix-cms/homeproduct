{widget_homeproduct_data}
{*<pre>{$homeproduct|print_r}</pre>*}
{if isset($homeproduct) && $homeproduct != null}
    <section id="homeproduct" class="homeproduct clearfix">
        <div class="container">
            <p class="h2">{#homeproduct_title#}</p>
            <div class="list-grid product-list" itemprop="mainEntity" itemscope itemtype="http://schema.org/ItemList">
                {include file="catalog/loop/product.tpl" data=$homeproduct classCol='vignette' nocache}
            </div>
        </div>
    </section>
{/if}