
<?php


if ($data == 'criollo' ) : ?>

    <article class="servicio-item">
        <figure class="load-images">
            <img src="<?php echo UPLOADSURL; ?>/dos.jpg" style="display:block;width:100%;margin:0 auto;" alt="menu criollo">
        </figure>

        <h1 class="h1-criollo">
            <span class="sr-only">Criollo</span>
        </h1>
        <p>
            Nuestros asados están hechos por Expertos asadores muy lentamente al rescoldo del fogón. Disfruta de la Calidad de la Tradicional carne Argentina con nuestra selección de Novillitos Aberdeen Angus criados en los mejores campos de la Región Pampeana.
        </p>
        <button>
            Ver Menú
        </button>
    </article>

<?php else : ?>

    <article class="servicio-item">
        <figure class="load-images">
            <img src="<?php echo UPLOADSURL; ?>/uno.jpg" style="display:block;width:100%;margin:0 auto;" alt="menu gourmet">
        </figure>
        <h1 class="h1-gourmet">
            <span class="sr-only">Gourmet</span>
        </h1>
        <p>
            Disfruta de la más variada selección de Sabores Gourmet, con productos elegidos y obtenidos de los lugares donde mejor expresan su calidad. Cada Bocado o Plato es tratado por nuestros Expertos Chefs con el cuidado y experiencia que se merecen.
        </p>
        <button>
            Ver Menú
        </button>
    </article>

<?php endif; ?>