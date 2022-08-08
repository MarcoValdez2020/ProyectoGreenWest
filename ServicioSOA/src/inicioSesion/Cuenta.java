package inicioSesion;

import java.sql.ResultSet;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LInsert;
import net.royalmind.library.lightquery.queries.LSelect;
import spark.Spark;

/**
 *
 * @author Yobiz
 */
public class Cuenta {

    public Cuenta(final HikariPool HIKARI_POOL) {

        Spark.get("/cuenta/agregar/:usuario/:password/:nombre/:apellidoP/:apellidoM/:"
                + "correo/:estado/:municipio/:calle/:numero_exterior/:"
                + "numero_interno", (request, response) -> {
                    System.out.println(response.toString());
                    System.out.println(response.toString());
                    try{
            String usuario = request.params(":usuario");
            String password = request.params(":password");
            final String lQuery = new LInsert()
                    .table("cuenta")
                    .values(
                            null, usuario, password, 0, 0
                            //Rol 1 para admin 0 para usuario
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            //Conección de una tabla con otra
            final String select = new LSelect().from("cuenta").value("*").getQuery();
            int id = HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(select).executeQuery();
                if (resultSet.next()) {
                    return resultSet.getInt("id_cuenta");
                }
                return null;
            });
            String nombre = request.params(":nombre");
            String apellidoP = request.params(":apellidoP");
            String apellidoM = request.params(":apellidoM");
            String correo = request.params(":correo");
            final String lQuery1 = new LInsert()
                    .table("usuario")
                    .values(
                            null, nombre, apellidoP, apellidoM, correo, id
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery1).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
            });
            final String select1 = new LSelect().from("usuario").value("*").getQuery();
            int id1 = HIKARI_POOL.execute(connection -> {
                final ResultSet resultSet = connection.prepareStatement(select1).executeQuery();
                if (resultSet.next()) {
                    return resultSet.getInt("id_usuario");
                }
                return null;
            });
            String estado = request.params(":estado");
            String municipio = request.params(":municipio");
            String calle = request.params(":calle");
            int numero_exterior = Integer.parseInt(request.params(":numero_exterior"));
            int numero_interno = Integer.parseInt(request.params(":numero_interno"));
            final String lQuery2 = new LInsert()
                    .table("direccion")
                    .values(
                            null, estado, municipio, calle, numero_exterior, numero_interno, id
                    )
                    .getQuery();
            HIKARI_POOL.execute((cnctn) -> {
                cnctn.prepareStatement(lQuery2).execute();
                return null; //To change body of generated lambdas, choose Tools | Templates.
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
