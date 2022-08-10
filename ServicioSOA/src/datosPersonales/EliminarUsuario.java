/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package datosPersonales;

import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LDelete;
import spark.Spark;

/**
 *
 * @author Marco Valdez
 */
public class EliminarUsuario {
    public EliminarUsuario(final HikariPool HIKARI_POOL){
        
        Spark.get("/cuenta/eliminarusuario/:id_cuenta", (request, response) -> {
            String id = request.params(":id_cuenta");
            final String lQuery = new LDelete()
                    .from("cuenta")
                    .where("id_cuenta", "=", id)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Usuario eliminado";
        });
    }
}
