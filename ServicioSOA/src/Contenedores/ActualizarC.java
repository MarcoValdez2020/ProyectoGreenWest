/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Contenedores;

import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LUpdate;
import spark.Spark;

/**
 *
 * @author itsje
 */
public class ActualizarC {
    
    public ActualizarC(final HikariPool HIKARI_POOL){
        Spark.get("/contenedores/actualizar/:id_contenedor", (request, response) -> {
            int contenedor = Integer.parseInt(request.params("id_contenedor"));
            final String lQuery = new LUpdate()
                    .table("contenedores")
                    .update("puntos","")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado Contenedor";
        });
        
        Spark.get("/catalogo/actualizar/:id_catalogo", (request, response) -> {
            int catalogo = Integer.parseInt(request.params("id_catalogo"));
            final String lQuery = new LUpdate()
                    .table("catalogo")
                    .update("tipoContenedor", "")
                    .update("capacidad", "")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado Catalogo";
        });
        
        Spark.get("/historial/actualizar/:id_historial", (request, response) -> {
            int historial = Integer.parseInt(request.params("id_historial"));
            final String lQuery = new LUpdate()
                    .table("historial")
                    .update("fecha_acceso", "")
                    .update("documento", "")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado Historial";
        });
    }
}
