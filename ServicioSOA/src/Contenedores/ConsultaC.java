/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Contenedores;

import com.google.gson.Gson;
import static com.sun.xml.internal.ws.spi.db.BindingContextFactory.LOGGER;
import java.sql.ResultSet;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LSelect;
import serviciosoa.Contenedor;
import serviciosoa.tipoContenedor;
import spark.Spark;

/**
 *
 * @author Jezer
 */
public class ConsultaC {
    
    public ConsultaC(final HikariPool HIKARI_POOL){
        Spark.get("/contenedor/obtener/:id_contenedor", (request, response) -> {
            String user = request.params(":id_contenedor");
            final String lQuery = new LSelect().from("contenedor").value("*").getQuery();
            return HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                if (resultSet.next()) {
                    final int id_contenedor = resultSet.getInt("id_contenedor");
                    final int capacidad = resultSet.getInt("capacidad");
                    final boolean estadoContenedor = resultSet.getBoolean("estadoContenedor");
                    final int id_usuario = resultSet.getInt("id_usuario");
                    final int id_tipoConte = resultSet.getInt("id_tipoConte");
                    
                    return new Gson().toJson(
                            new Contenedor(id_contenedor, capacidad, estadoContenedor, id_usuario, id_tipoConte),
                            Contenedor.class
                    );
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
        });
        
        Spark.get("/tipoContenedor/obtener/:id_tipoConte", (request, response) -> {
            String user = request.params(":id_tipoConte");
            final String lQuery = new LSelect().from("tipoContenedor").value("*").getQuery();
            return HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(lQuery).executeQuery();
                if (resultSet.next()) {
                    final int id_tipoConte = resultSet.getInt("id_tipoConte");
                    final String tipoContenedor = resultSet.getString("tipoContenedor");
                    final int puntos = resultSet.getInt("puntos");
                    
                    return new Gson().toJson(
                            new tipoContenedor(id_tipoConte, tipoContenedor, puntos),
                            tipoContenedor.class
                    );
                }
                LOGGER.info(String.format("(Select) lQuery executed! \n lQuery: %s", lQuery));
                return null;
            });
        });
    }
}
