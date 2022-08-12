/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Contenedores;

import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LDelete;
import spark.Spark;

/**
 *
 * @author itsje
 */
public class EliminarC {
    public EliminarC(final HikariPool HIKARI_POOL){
        
        Spark.get("/contenedor/eliminar/:id_contenedor", (request, response) -> {
            int id_contenedor = Integer.parseInt(request.params(":id_contenedor"));
            final String lQuery = new LDelete()
                    .from("contenedor")
                    .where("id_contenedor", "=", id_contenedor)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Eliminado Contenedor";
        });
        
        Spark.get("/tipoContenedor/eliminar/:id_tipoConte", (request, response) -> {
            int id_tipoConte = Integer.parseInt(request.params(":id_tipoConte"));
            final String lQuery = new LDelete()
                    .from("tipocontenedor")
                    .where("id_tipoConte", "=", id_tipoConte)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Eliminado el tipo de contenedor";
        });
    }
}
