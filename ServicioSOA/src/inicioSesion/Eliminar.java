package inicioSesion;

import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LDelete;
import spark.Spark;

/**
 * @author Yobiz
 */
public class Eliminar {
    
    public Eliminar(final HikariPool HIKARI_POOL){
        
        Spark.get("/cuenta/eliminar/:usuario", (request, response) -> {
            String usuario = request.params(":usuario");
            final String lQuery = new LDelete()
                    .from("cuenta")
                    .where("usuario", "=", usuario)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Eliminado";
        });
        
        Spark.get("/usuario/eliminar/:nombre", (request, response) -> {
            String usuario = request.params(":nombre");
            final String lQuery = new LDelete()
                    .from("usuario")
                    .where("nombre", "=", usuario)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Eliminado";
        });
        
        Spark.get("/direccion/eliminar/:id_usuario", (request, response) -> {
            String usuario = request.params(":id_usuario");
            final String lQuery = new LDelete()
                    .from("direccion")
                    .where("id_usuario", "=", usuario)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Eliminado";
        });
    }
}
