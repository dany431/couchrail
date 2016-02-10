package co.couchrail.couchrail;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;


public class Intro extends Activity implements View.OnClickListener {

    Button signin, signup;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_intro);

        signin = (Button) findViewById(R.id.intro_signIn);
        signup = (Button) findViewById(R.id.intro_signUp);

        signin.setOnClickListener(this);
        signup.setOnClickListener(this);

    }

    @Override
    public void onClick(View v) {
        Intent intent;

        switch (v.getId()){
            case R.id.intro_signIn:
                intent = new Intent(Intro.this, Login.class);
                startActivity(intent);
                break;
            case R.id.intro_signUp:
                intent = new Intent(Intro.this, Signup.class);
                startActivity(intent);
                break;
        }

    }
}
