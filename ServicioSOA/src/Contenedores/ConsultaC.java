/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Contenedores;

import static com.sun.xml.internal.ws.spi.db.BindingContextFactory.LOGGER;
import java.sql.ResultSet;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LSelect;
import spark.Spark;

/**
 *
 * @author itsje
 */
public class ConsultaC {
    
    public ConsultaC(final HikariPool HIKARI_POOL){
        Spark.get("/contenedores/obtener/:id_contenedor", (request, response) -> {
            int contenedor = Integer.parseInt(request.params(":id_contenedor"));
            final String lQuery = new LSelect().from("contenedores").value("*").getQuery();
            HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                while (resultSet.next()) {
                    final int id_contenedor = resultSet.getInt("id_contenedor");
                    final int puntos = resultSet.getInt("puntos");
                    final int id_catalogo = resultSet.getInt("id_catalogo");
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
            return "Obtenido Contenedores";
        });
        
        Spark.get("/catalogo/actualizar/:id_catalogo", (request, response) -> {
            int catalogo = Integer.parseInt(request.params(":id_catalogo"));
            final String lQuery = new LSelect().from("catalogo").value("*").getQuery();
            HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                while (resultSet.next()) {
                    final int id_catalogo = resultSet.getInt("id_catalogo");
                    final String tipoContenedor = resultSet.getString("tipoContenedor");
                    final double capacidad = resultSet.getDouble("capacidad");
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
            return "Obteniendo Catalogo";
        });
        
        Spark.get("/historial/actualizar/:id_historial", (request, response) -> {
            int catalogo = Integer.parseInt(request.params(":id_historial"));
            final String lQuery = new LSelect().from("historial").value("*").getQuery();
            HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                while (resultSet.next()) {
                    final int id_historial = resultSet.getInt("id_historial");
                    final String fecha_acceso = resultSet.getString("fecha_acceso");
                    final long documento = resultSet.getLong("documento");
                    final int id_contenedores = resultSet.getInt("id_contenedor");
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
            return "Obteniendo historial";
        });
    }
    
}
