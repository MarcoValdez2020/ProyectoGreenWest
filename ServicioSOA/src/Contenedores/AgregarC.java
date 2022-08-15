package contenedores;

import static com.sun.xml.internal.ws.spi.db.BindingContextFactory.LOGGER;
import java.sql.ResultSet;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LDelete;
import net.royalmind.library.lightquery.queries.LInsert;
import net.royalmind.library.lightquery.queries.LSelect;
import net.royalmind.library.lightquery.queries.LUpdate;
import spark.Spark;

/**
 *
 * @author Jezer
 */
public class AgregarC {
    
    public AgregarC(final HikariPool HIKARI_POOL) {
        
        Spark.get("/contenedor/agregar/:tipoContenedor/:"
                + "puntos/:capacidad/:"
                + "estadoContenedor/:id_usuario", (request, response) -> {
                    System.out.println(response.toString());
                    System.out.println(response.toString());
                    try{
            String tipoContenedor = request.params(":tipoContenedor");
            int puntos = Integer.parseInt(request.params(":puntos"));            
              
            final String lQuery = new LInsert()
                    .table("tipocontenedor")
                    .values(
                            null, tipoContenedor, puntos
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null;
            });
            final String select = new LSelect()
                    .from("tipocontenedor")
                    .value("*")
                    .where("tipoContenedor", "=", tipoContenedor)
                    .getQuery();
            int id = HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(select).executeQuery();
                if (resultSet.next()) {
                    return resultSet.getInt("id_tipoConte");
                }
                return null;
            });
            int capacidad = Integer.parseInt(request.params(":capacidad"));
            boolean estadoContenedor = Boolean.parseBoolean(request.params(":estadoContenedor"));
            int id_usuario = Integer.parseInt(request.params(":id_usuario"));
            final String lQuery1 = new LInsert()
                    .table("contenedor")
                    .values(
                            null, capacidad, estadoContenedor, id_usuario, id
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery1).execute();
                return null;
            });
            return "Datos agregados";
            
            }
                    catch (final Exception ex){
                        ex.printStackTrace();
                    }
                    return "";
        });
    }
}