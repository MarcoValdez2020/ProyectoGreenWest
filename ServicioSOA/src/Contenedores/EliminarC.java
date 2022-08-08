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
        
        Spark.get("/contenedores/eliminar/:id_contenedor", (request, response) -> {
            int id_contenedor = Integer.parseInt(request.params(":id_contenedor"));
            final String lQuery = new LDelete()
                    .from("contenedores")
                    .where("id_contenedor", "=", id_contenedor)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return null;
        });
        
        Spark.get("/usuario/eliminar/:id_catalogo", (request, response) -> {
            int id_catalogo = Integer.parseInt(request.params(":id_catalogo"));
            final String lQuery = new LDelete()
                    .from("catalogo")
                    .where("id_catalogo", "=", id_catalogo)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return null;
        });
        
        Spark.get("/historial/eliminar/:id_historial", (request, response) -> {
            int id_historial = Integer.parseInt(request.params(":id_historial"));
            final String lQuery = new LDelete()
                    .from("historial")
                    .where("id_historial", "=", id_historial)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return null;
        });
        
        Spark.get("/asignacion/eliminar/:id_asignacion", (request, response) -> {
            int id_asignacion = Integer.parseInt(request.params(":id_asignacion"));
            final String lQuery = new LDelete()
                    .from("asignacion")
                    .where("id_asignacion", "=", id_asignacion)
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            return "Se eliminaron todos los datos referente a los contenedores";
        });
    }
}
