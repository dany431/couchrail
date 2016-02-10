package co.couchrail.couchrail;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Login extends Activity implements View.OnClickListener {
    Button login, signup;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        login = (Button) findViewById(R.id.login_signin);
        signup = (Button) findViewById(R.id.login_signUp);

        login.setOnClickListener(this);
        signup.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        Intent intent;

        switch (v.getId()){
            case R.id.login_signin:
                intent = new Intent(Login.this, Home.class);
                startActivity(intent);
                break;
            case R.id.login_signUp:
                intent = new Intent(Login.this, Signup.class);
                startActivity(intent);
                break;
        }
    }
}
