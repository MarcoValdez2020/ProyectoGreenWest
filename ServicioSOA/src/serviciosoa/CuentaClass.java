/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serviciosoa;

/**
 *
 * @author Marco Valdez
 */
public class CuentaClass {
    
    private final int id_cuenta,puntos ;
    private final String usuario, password;
    private final boolean rol;
      
    public CuentaClass(final int id_cuenta, final String usuario, final String  password, final int  puntos, final boolean rol) {
      this.id_cuenta = id_cuenta;
      this.usuario = usuario;
      this.password = password;
      this.puntos = puntos;
      this.rol = rol;
  }
}
