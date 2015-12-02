package mapa.com.listview;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.database.Cursor;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.ListView;
import android.widget.SimpleCursorAdapter;
import android.widget.TextView;


public class Listview extends AppCompatActivity {

    Button btnAgregarParqueadero;
    ListView lista;
    SQLControlador dbconeccion;
    TextView ID, Nombre;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listview);

        dbconeccion = new SQLControlador(this);
        dbconeccion.abrirBaseDeDatos();
        btnAgregarParqueadero = (Button) findViewById(R.id.btnAgregarParqueadero);
        lista = (ListView) findViewById(R.id.listViewMiembro);

        //acción del boton agregar miembro
        btnAgregarParqueadero.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent iagregar = new Intent(Listview.this, Agregar.class);
                startActivity(iagregar);
            }
        });

        // Tomar los datos desde la base de datos para poner en el curso y después en el adapter
        Cursor cursor = dbconeccion.leerDatos();

        String[] from = new String[] {
                DBhelper.ID,
                DBhelper.NOMBRE
        };
        int[] to = new int[] {
                R.id.ID,
                R.id.nombre
        };

        SimpleCursorAdapter adapter = new SimpleCursorAdapter(
                Listview.this, R.layout.formato_fila, cursor, from, to);

        adapter.notifyDataSetChanged();
        lista.setAdapter(adapter);

    }
}
