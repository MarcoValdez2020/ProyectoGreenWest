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
        Spark.get("/contenedor/actualizar/:id_contenedor", (request, response) -> {
            int contenedor = Integer.parseInt(request.params("id_contenedor"));
            final String lQuery = new LUpdate()
                    .table("contenedor")
                    .update("capacidad", "")
                    .update("estadoContenedor", "")
                    .where("id_contenedor", "=", "_")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado Contenedor";
        });
        
        Spark.get("/tipoContenedor/actualizar/:id_tipoConte", (request, response) -> {
            int catalogo = Integer.parseInt(request.params("id_tipoConte"));
            final String lQuery = new LUpdate()
                    .table("tipocontenedor")
                    .update("tipoContenedor", "")
                    .update("puntos", "")
                    .where("id_tipoConte", "=", "_")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado Catalogo";
        });
    }
}
