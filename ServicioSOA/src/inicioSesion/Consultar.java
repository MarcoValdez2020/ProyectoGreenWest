
package inicioSesion;

import com.google.gson.Gson;
import static com.sun.xml.internal.ws.spi.db.BindingContextFactory.LOGGER;
import java.sql.ResultSet;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LSelect;
import serviciosoa.Usuario;
import spark.Spark;

/**
 *
 * @author Yobiz
 */
public class Consultar {
    
    public Consultar(final HikariPool HIKARI_POOL){
        Spark.get("/cuenta/login/:usuario/:pass", (request, response) -> {
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
                return String.valueOf(resultSet.next());
            });
        });
        
        Spark.get("/usuario/obtener/:nombre", (request, response) -> {
            String user = request.params(":nombre");
            final String lQuery = new LSelect().from("usuario").value("*").getQuery();
            return HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                if (resultSet.next()) {
                    final int id_usuario = resultSet.getInt("id_usuario");
                    final String nombre = resultSet.getString("nombre");
                    final String apellidoP = resultSet.getString("apellidoP");
                    final String apellidoM = resultSet.getString("apellidoM");
                    final int id_cuenta = resultSet.getInt("id_cuenta");
                    //final int id_rol = resultSet.getInt("id_rol");
                    return new Gson().toJson(
                            new Usuario(id_usuario, nombre, apellidoP, apellidoM),
                            Usuario.class
                    );
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
        });
        
        Spark.get("/direccion/obtener/:id_direccion", (request, response) -> {
            String user = request.params(":id_direccion");
            final String lQuery = new LSelect().from("dirección").value("*").getQuery();
            HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                while (resultSet.next()) {
                    final int id_direccion = resultSet.getInt("id_direccion");
                    final String estado = resultSet.getString("estado");
                    final String municipio = resultSet.getString("minicipio");
                    final String calle = resultSet.getString("calle");
                    final int numero_exterior = resultSet.getInt("numero_exterior");
                    final int numero_interno = resultSet.getInt("numero_interno");
                    final int id_usuario = resultSet.getInt("id_usuario");
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
            return "Obteniendo";
        });
    }
}
