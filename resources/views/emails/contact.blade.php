<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 8px; }
        .header { background-color: #1a1a1d; color: #fff; padding: 15px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; background: #fff; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nuevo Mensaje de Contacto</h2>
            <p>Alguien te ha contactado desde la página web de Conejo Cantú</p>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">Nombre:</div>
                <div class="value">{{ $contactData['name'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Correo Electrónico:</div>
                <div class="value">{{ $contactData['email'] }}</div>
            </div>
            
            @if(!empty($contactData['phone']))
            <div class="field">
                <div class="label">Teléfono:</div>
                <div class="value">{{ $contactData['phone'] }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="label">Mensaje:</div>
                <div class="value" style="white-space: pre-wrap;">{{ $contactData['message'] }}</div>
            </div>
        </div>
        
        <div class="footer">
            <p>Este correo fue generado automáticamente por el sitio web conejocantu.com</p>
        </div>
    </div>
</body>
</html>
