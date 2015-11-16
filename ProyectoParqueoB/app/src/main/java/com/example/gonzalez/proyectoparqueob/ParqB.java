package com.example.gonzalez.proyectoparqueob;

import android.graphics.Color;
import android.location.Location;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;

import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.Circle;
import com.google.android.gms.maps.model.CircleOptions;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

public class ParqB extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_parq_b);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
    }


    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        //zoom 2.0 a 21.0f
        LatLng loja = new LatLng(-3.986723, -79.199002);

        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(loja, 14));

        mMap.addMarker(new MarkerOptions().position(loja).title("Marcador en UTPL"));
        mMap.moveCamera(CameraUpdateFactory.newLatLng(loja));

        CircleOptions circleOptions = new CircleOptions()
                .center(new LatLng(-3.99448, -79.205492)).radius(10)
                .strokeColor(Color.BLUE); // In meters



        CircleOptions circleOptions2 = new CircleOptions()
                .center(new LatLng(-3.997328, -79.20586)).radius(10)
                .strokeColor(Color.BLUE); // In meters



        CircleOptions circleOptions3 = new CircleOptions()
                .center(new LatLng(-3.993969, -79.19847)).radius(10)
                .strokeColor(Color.BLUE); // In meters

        Circle circle = googleMap.addCircle(circleOptions);
        Circle circle1 = googleMap.addCircle(circleOptions2);
        Circle circle3 = googleMap.addCircle(circleOptions3);


    }
}
