<body style="background-color: #EAECED; font-family:Arial, Helvetica, sans-serif;">
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#eaeced">
    <tr>
        <td align="center" valign="top">
            <table class="master-table" width="600">
                <tr>
                    <td align="center" valign="top">
                        <table class="responsive-table" width="580" bgcolor="#ffffff" border="0" cellpadding="5"
                               cellspacing="0" valign="top" style="overflow:hidden !important;">
                            <tbody>
                            <tr>
                                <td>
                                    <h3 style="background-color: #005596; color:#fff; padding:5px;"><?= $title ?></h3>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:20px;">

                                    <div><?= $content ?></div>

                                    <code style="color:#7e8890;" align="right"><?= Yii::$app->
                                        formatter->asDatetime(date('Y-m-d'), 'long') ?></code>

                                    <p>
                                        <code><a href="<?= $url ?>" style="">Ver en sitio web</a></code>
                                    </p>
                                </td>
                            </tr>

                            <!-- boton -->

                            <tr>
                                <td align="center" valign="top">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top">

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- boton -->

                            <!-- footer -->
                            <tr>
                                <td align="center">
                                    <table width="90%">
                                        <tbody>
                                        <tr>
                                            <td align="justify"
                                                style="font-family:'Open Sans', arial, sans-serif !important;font-size:12px !important;font-weight:400 !important;color:#7e8890 !important;">
                                                ASOCAM es el Servicio de Gestión del Conocimiento para América Latina
                                                que apoya procesos de construcción colectiva de conocimientos, que
                                                permite compartir y avanzar en temas específicos, generando productos de
                                                alta calidad y utilidad para los actores de desarrollo.
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>


                            <tr height="10">
                                <td>&nbsp;</td>
                            </tr>

                            <!-- footer -->
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
