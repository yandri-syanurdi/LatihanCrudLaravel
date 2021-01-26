import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  View,
  Button,
  Dimensions,
  ScrollView,
  TouchableOpacity,
  Alert,
} from 'react-native';

import {
    Container, Header, List, ListItem, Left, Body, Right, Thumbnail, 
    Item, Input, Title, Subtitle, CheckBox, Card, CardItem, Content, Grid, Col,
} from 'native-base';


import Icon from 'react-native-vector-icons/Ionicons';
import Animbutton from './animbutton'
const { width, height } = Dimensions.get('window')
let arrnew = []



//http://nobrok.com/create-a-quiz-app-using-react-native/

const jsonData = {"quiz" : {
  "quiz1" : {
    "question1" : {
      "correctoption" : "option3",
      "options" : {
        "option1" : "Tidak tau",
        "option2" : "Tidak tau",
        "option3" : "ALLAH SWT",
        "option4" : "Tidak tau",
       
      },
          "question": "agama.png"
    },
    "question2" : {
      "correctoption" : "option4",
      "options" : {
          "option1" : "Tidak tau",
          "option2" : "Tidak tau",
          "option3" : "Tidak tau",
          "option4" : "Agama Islam",
        
        },
        "question": "agama.png"
    },
    "question3" : {
      "correctoption" : "option1",
      "options" : {
          "option1" : "Nabi Muhammad SAW",
          "option2" : "Tidak tau",
          "option3" : "Tidak tau",
          "option4" : "Tidak tau",
          
        },
        "question": "agama.png"
    },
    "question4" : {
      "correctoption" : "option2",
      "options" : {
          "option1" : "Tidak tau",
          "option2" : "AL-QUR'AN",
          "option3" : "Tidak tau",
          "option4" : "Tidak tau",
         
        },
        "question": "agama.png"
    },
    "question5" : {
      "correctoption" : "option1",
      "options" : {
          "option1" : "Tidak tau",
          "option2" : "Tidak tau",
          "option3" : "Tidak tau",
          "option4" : "Tidak tau",
         
        },
        "question": "agama.png"
    },
    "question6" : {
      "correctoption" : "option1",
      "options" : {
          "option1" : "Tidak tau",
          "option2" : "Tidak tau",
          "option3" : "Tidak tau",
          "option4" : "Tidak tau",
        
        },
        "question": "agama.png"
    },
  }
}
}
export default class Quiz extends Component {
  constructor(props){
    super(props);
    this.qno = 0
    this.score = 0

    const jdata = jsonData.quiz.quiz1
    arrnew = Object.keys(jdata).map( function(k) { return jdata[k] });
    this.state = {
      question : arrnew[this.qno].question,
      options : arrnew[this.qno].options,
      correctoption : arrnew[this.qno].correctoption,
      countCheck : 0, 
    //   warna : '',
      warna : "green",
    }

  }
  prev(){
    if(this.qno > 0){
      this.qno--
      this.setState({ question: arrnew[this.qno].question, options: arrnew[this.qno].options, correctoption : arrnew[this.qno].correctoption})
    }
  }
  next(){
    // this.setState.warna =  "#bdbdbd"

    // this.setState({ warna: "#bdbdbd" });

    if(this.qno < arrnew.length-1){
      this.qno++

      this.setState({ countCheck: 0, question: arrnew[this.qno].question, options: arrnew[this.qno].options, correctoption : arrnew[this.qno].correctoption})
    }else{
      
      this.props.quizFinish(this.score*100/6)
     }
  }

  jawaban () {
       if(status == true){
        // this.setState({ warna: "green" });
        // return alert("berhasil")
        const count = this.state.countCheck + 1
        this.setState({ countCheck: count })
        if(ans == this.state.correctoption ){
          this.score += 1
        //   return alert("berhasil")
        }
      }else{
        // this.setState({ warna: "green" });
        const count = this.state.countCheck - 1
        this.setState({ countCheck: count })
        if(this.state.countCheck < 1 || ans == this.state.correctoption){
        // this.score -= 1
        this.score -= 0
            // return alert("salah")
       }
      }
  }

  truePressed = () => {
    Alert.alert(
      'Correct Answer',
      'Your The Master',
      [
        { text: 'No', onPress: () => console.log('Cancel Pressed'), style: 'cancel' },
        // { text: 'Yes', onPress: () => BackHandler.exitApp() },
        { text: 'Yes', onPress: () => this.next() },
      ],
      { cancelable: false });
    return true;
  }

  yandri() {
    // <Text>Halo</Text>
    // return(
    //   <View>Halo</View>
    // )
  }

  wrongPressed = () => {
    var a = this.state.correctoption;
    //const a = this.state.correctoption
    Alert.alert(
    
      'Wrong Answer',
      //this.yandri(),
      // 'Correct Answer is ' + this.state.options.option3,
      // 'Correct Answer is ' + this.state.correctoption,
      //a = this.state.correctoption,
      'Correct Answer is ' + this.state.options[this.state.correctoption],
      
      [
        // <Text>Halo</Text>,
        { text: 'No', onPress: () => console.log('Cancel Pressed'), style: 'cancel' },
        // { text: 'Yes', onPress: () => BackHandler.exitApp() }, 
        { text: 'Yes', onPress: () => this.next() }, 
      ],
      { cancelable: false });
    return true;
  }

  _answer(status,ans){

    if(status == true){
        // this.setState({ warna: "green" });
    //    alert("berhasil")

        // alert("salah")
        this.wrongPressed()
        const count = this.state.countCheck + 1
        this.setState({ countCheck: count })
        if(ans == this.state.correctoption ){
          this.score += 1
          // return alert("berhasil")
          this.truePressed()
        }
      }else{
        // this.setState({ warna: "green" });
        // alert("salah")
        const count = this.state.countCheck - 1
        this.setState({ countCheck: count })
        if(this.state.countCheck < 1 || ans == this.state.correctoption){
        // this.score -= 1
        this.score -= 0
            // return alert("salah")
       }
      }

  }
  render() {
    let _this = this
    const currentOptions = this.state.options
    const warnaku = this.state.warna
    console.log(this.state.warna);

    const options = Object.keys(currentOptions).map( function(k) {
    //   k.color="green";
    
      return (  
      
    //   <View key={k} style={{margin:10}}>
          <View key={k} style={{ }}>
       
        <Animbutton countCheck={_this.state.countCheck}  
                  style={{  }}
        // onColor={"green"}
            onColor={"#bdbdbd"}
        // onColor={{"#bdbdbd" : "green"}} 
        // onColor={this.warna}
        // onColor={warnaku}
        effect={"tada"} _onPress={(status) => _this._answer(status,k)} text={currentOptions[k]}
        // onPress={this._answer}
        
        />

      </View>)
    });

    return (
      <ScrollView style={{backgroundColor: 'blue',paddingTop: 10}}>
      <View style={styles.container}>

      <View style={{ flex: 1,flexDirection: 'column', justifyContent: "center", alignItems: 'center',}}>

      <View style={styles.oval} >
        {/* <Text style={styles.welcome}>
          {this.state.question}
        </Text> */}

    <Thumbnail
        source={{ uri: "http://192.168.43.251/laravel-crud/public/storage/background/" + this.state.question }}
                            // source={require(this.state.question)}
                            style={{ width: width * 90 / 100, height: 210, borderRadius: 10, marginRight: 5 }} />

        
     </View>
        <View style ={{ justifyContent: "center", alignItems: "center"}}>
        {/* <View> */}
        { options }
        </View>
       
        </View>
      </View>


            <View style={{ flexDirection: "row", justifyContent: "space-between" , marginTop: 10}}>
                {/*   <Button
          onPress={() => this.prev()}
          title="Prev"
          color="#841584"
        />
        <View style={{margin:15}} />*/}

                <TouchableOpacity onPress={() => this.prev()} style={{ alignItems: "flex-start", marginLeft: 20 }} >
                    <View style={{ paddingTop: 5, paddingBottom: 5, paddingRight: 20, paddingLeft: 20, borderRadius: 10, backgroundColor: "green", alignItems: 'flex-start' }}>
                        <Icon name="md-arrow-round-back" size={30} color="white" style={{ alignItems: "flex-start" }} />
                    </View>
                </TouchableOpacity >

                <TouchableOpacity onPress={() => this.next()} style={{ alignItems: "flex-end", marginRight: 20}}>
                    <View style={{ paddingTop: 5, paddingBottom: 5, paddingRight: 20, paddingLeft: 20, borderRadius: 10, backgroundColor: "green", alignItems: "flex-end" }}>
                        <Icon name="md-arrow-round-forward" size={30} color="white" />
                    </View>
                </TouchableOpacity >

            </View>
      </ScrollView>
    );
  }
}

const styles = StyleSheet.create({

  oval: {
  width: width * 90/100,
  borderRadius: 20,
  backgroundColor: 'green'
  },
  container: {
    flex: 1,
    alignItems: 'center'
  },
  welcome: {
    fontSize: 20,
    margin: 15,
    color: "white"
  },
  instructions: {
    textAlign: 'center',
    color: '#333333',
    marginBottom: 5,
  },
});