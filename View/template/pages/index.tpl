{extends file="layout.tpl"}
{block name=body}
<section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="images/gallery/pexels-rdne-6129507.jpg" class="img-fluid galleryImage" alt="img home page"
                    title="img home page">
            </div>

        </div>
    </div>
</section>


<section class="section-padding pb-0" id="reviews">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="text-center mb-lg-5 mb-4">I NOSTRI PAZIENTI</h2>

                <div class="owl-carousel reviews-carousel">

                    {foreach $recensioni as $recensione}
                        <figure class="reviews-thumb d-flex flex-wrap align-items-center rounded">
                            <div class="reviews-stars">
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star"></i>
                            </div>

                            <p class="text-primary d-block mt-2 mb-0 w-100"><strong>{$recensione.titolo}</strong></p>

                            <p class="reviews-text w-100">{$recensione.descrizione}</p>

                            <img src="images/reviews/beautiful-woman-face-portrait-brown-background.jpeg"
                                class="img-fluid reviews-image" alt="">

                            <figcaption class="ms-4">
                                <strong>{$recensione.paziente}</strong>

                                <span class="text-muted">Patient</span>
                            </figcaption>
                        </figure>
                    {/foreach}

                </div>
            </div>

        </div>
    </div>
</section>
{/block}

{include file='../footer/stock_footer.tpl'}