<h3>Proceso de deploy para estilos:</h3>

<ol>
<li>Se debe editar el archivo less ubicado en <pre>app/design/frontend/CannedHead/dobledos/web/css/source/_extend.less</pre></li>
<li>Se ingresa a la consola del servidor  <pre>bin/magento deploy:mode:set production</pre></li>
<li>Se deben reasignar permisos a las carpetas var y pub<br/>
<pre>chmod -R 777 var
chmod -R 777 pub</pre>
</li>
<li>Se deben limpiar cachés
<pre>bin/magento cache:clean
bin/magento cache:flush</pre>
</li>
</ol>
