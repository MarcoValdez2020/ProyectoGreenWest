/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package datosPersonales;

import com.google.gson.Gson;
import static com.sun.xml.internal.ws.spi.db.BindingContextFactory.LOGGER;
import java.sql.ResultSet;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LSelect;
import serviciosoa.CuentaClass;
import serviciosoa.Usuario;
import spark.Spark;

/**
 *
 * @author Marco Valdez
 */
public class ConsultarUsuario {
    public ConsultarUsuario(final HikariPool HIKARI_POOL){
        Spark.get("/cuenta/consultarcuenta/:usuario/:pass", (request, response) -> {
            String user = request.params(":usuario");
            String pass  = request.params(":pass");
            final String lQuery = new LSelect()
                    .from("cuenta")
                    .value("*")
                    .where("usuario", "=", user)
                    .and("password", "=", pass)
                    .getQuery();
            return HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                if (resultSet.next()) {
                    final int id_cuenta = resultSet.getInt("id_cuenta");
                    final String usuario = resultSet.getString("usuario");
                    final String password = resultSet.getString("password");
                    final int puntos = resultSet.getInt("puntos");
                    final boolean rol = resultSet.getBoolean("rol");
                    return new Gson().toJson(
                            new CuentaClass(id_cuenta, usuario, password, puntos, rol),
                            CuentaClass.class
                    );
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
        });
        
        Spark.get("/usuario/obtenerusuario/:id_cuenta", (request, response) -> {
            String id = request.params(":id_cuenta");
            final String lQuery = new LSelect().from("usuario").value("*").where("id_cuenta","=",id).getQuery();
            return HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                if (resultSet.next()) {
                    final int id_usuario = resultSet.getInt("id_usuario");
                    final String nombre = resultSet.getString("nombre");
                    final String apellidoP = resultSet.getString("apellidoP");
                    final String apellidoM = resultSet.getString("apellidoM");
                    final String correo = resultSet.getString("correo");
                    final int id_cuenta = resultSet.getInt("id_cuenta");
                    return new Gson().toJson(
                            new Usuario(id_usuario, nombre, apellidoP, apellidoM, correo, id_cuenta),
                            Usuario.class
                    );
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
                
                
            });
        });
    }
}
