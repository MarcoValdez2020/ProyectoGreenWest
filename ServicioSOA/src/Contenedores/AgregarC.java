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
 * @author itsje
 */
public class AgregarC {
    
    public AgregarC(final HikariPool HIKARI_POOL) {
        
        Spark.get("/contenedores/agregar/:puntos/:"
                + "tipoContenedor/:capacidad/:"
                + "fecha_acceso/:documento/:"
                + "estado", (request, response) -> {
            int puntos = Integer.parseInt(request.params(":puntos"));
            final String lQuery = new LInsert()
                    .table("contenedores")
                    .values(
                            null, puntos
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            final String select = new LSelect().from("cuenta").value("*").getQuery();
            int id = HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(select).executeQuery();
                if (resultSet.next()) {
                    return resultSet.getInt("id");
                }
                return null;
            });
            String tipoContenedor = request.params(":tipoContenedor");
            double capacidad = Integer.parseInt(request.params(":capacidad"));
            final String lQuery1 = new LInsert()
                    .table("catalogo")
                    .values(
                            null, tipoContenedor, capacidad
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            final String select1 = new LSelect().from("usuario").value("*").getQuery();
            int id1 = HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(select1).executeQuery();
                if (resultSet.next()) {
                    return resultSet.getInt("id");
                }
                return null;
            });
            String fecha_acceso = request.params(":fecha_acceso");
            String documento = request.params(":documento");
            final String lQuery2 = new LInsert()
                    .table("direccion")
                    .values(
                        null, fecha_acceso, documento
                    ).getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            final String select2 = new LSelect().from("historial").value("*").getQuery();
            int id2 = HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(select1).executeQuery();
                if (resultSet.next()) {
                    return resultSet.getInt("id");
                }
                return null;
            });
            boolean estado = Boolean.parseBoolean(request.params(":estado"));
            final String lQuery3 = new LInsert()
                    .table("asignacion")
                    .values(
                        null, null, null, null, true
                    ).getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null;
            });
            return "Datos agregados";
        });
    }
}