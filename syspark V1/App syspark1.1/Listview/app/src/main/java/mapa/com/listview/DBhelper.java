package mapa.com.listview;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by Santi on 24/11/15.
 */
public class DBhelper extends SQLiteOpenHelper {

    // Información de la tabla
    public static final String TABLE_MEMBER = "parqueadero";
    public static final String ID = "id";
    public static final String NOMBRE = "nombre";

    // información del a base de datos
    static final String DB_NAME = "SYSPARK";
    static final int DB_VERSION = 1;

    // Información de la base de datos
    private static final String CREATE_TABLE = "create table "
            + TABLE_MEMBER + "(" + ID
            + " INTEGER PRIMARY KEY AUTOINCREMENT, "
            + NOMBRE + " TEXT NOT NULL);";

    public DBhelper(Context context) {
        super(context, DB_NAME, null,DB_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(CREATE_TABLE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // TODO Auto-generated method stub
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_MEMBER);
        onCreate(db);
    }
}