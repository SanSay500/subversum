import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";

const root = ReactDOM.createRoot(document.getElementById("root"));
document.title='Subversum Space';

root.render(
    <React.StrictMode>
        <div className='container'>
            <img src=  "image_2022-07-18_12-20-57.png"/>
            <iframe width="1000" height="720" src="https://www.youtube.com/embed/hAUUmHvxqtA"
                    title="SUBVERSUM Pre-Launch Trailer" frameBorder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowFullScreen>
            </iframe>

            <p>COMING SOON...</p>
        {/*<App />*/}
        </div>
    </React.StrictMode>
);
