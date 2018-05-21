<form id="main-form" class="formulario" method="POST">

    <div class="form-inner">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="empresa" placeholder="Empresa">
        <input type="text" name="salon" placeholder="Salon">
    </div>

    <div class="form-inner">
        <input type="text" name="ciudad" placeholder="Ciudad">
        <input type="text" name="telefono" placeholder="Teléfono">
        <input type="email" name="email" placeholder="Email">
    </div>

    <div class="form-inner form-inner-bigger">
        <input type="text" name="evento" placeholder="Tipo de Evento">
        <div class="form-inner-cols">
            <input type="text" name="invitados" placeholder="Cantidad de invitados" class="widht-60">
            <input type="text" name="horario" placeholder="Horario" class="widht-40">
        </div>
        <?php 
            global $dispositivo;
            if ( $dispositivo != 'pc') : ?>
            <textarea name="msj">Dejanos tu consulta</textarea>    
        <?php else : ?>
            <textarea name="msj" placeholder="Dejanos tu consulta"></textarea>
        <?php endif; ?>
        
    </div>
    <div class="submit-wrapper">
    
        <span class="msj-error"></span>
    
        <input type="submit" value="Enviar">
    </div>
</form>