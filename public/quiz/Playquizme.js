// import React, { Component } from 'react';
// // import Quiz from '../../components/quiz';
// import Quiz from './quiz';
// import {
//     StyleSheet,
//     StatusBar,
//     TouchableOpacity,
//     View,
//     Text,
// } from 'react-native';

// import Icon from 'react-native-vector-icons/FontAwesome';
// export default class Playquizme extends Component {
//     constructor(props){
//         super(props)
//         this.state = {
//             quizFinish : false,
//             score: 0,
//         }
//     }

//     _onPressBack(){
//         // const {goBack} = this.props.navigation
//         // goBack()
//         const {goBack} = this.props.navigation
//         goBack()
//     }
//     _quizFinish(score){
//         this.setState({  quizFinish: true, score : score })
//     }
//     _scoreMessage(score){
//         if(score <= 30 ){
//             return (<View style={styles.innerContainer} >
//                 <View style={{ flexDirection: "row" }} >
//                     <Icon name="trophy" size={30} color="white" />
//                 </View>
//                 <Text style={styles.score}>You need to work hard</Text>
//                 <Text style={styles.score}>You scored {score}%</Text>
//             </View>);
//         }else if(score > 30 && score < 60 ) {
//             return (<View style={styles.innerContainer} >
//                 <View style={{ flexDirection: "row" }} >
//                     <Icon name="trophy" size={30} color="white" />
//                     <Icon name="trophy" size={30} color="white" />
//                 </View>
//                 <Text style={styles.score}>You are good</Text>
//                 <Text style={styles.score}>Congrats you scored {score}%</Text>
//             </View>);
//         }else if(score >= 60){
//             return (<View style={styles.innerContainer} >
//                 <View style={{ flexDirection: "row" }} >
//                     <Icon name="trophy" size={30} color="white" />
//                     <Icon name="trophy" size={30} color="white" />
//                     <Icon name="trophy" size={30} color="white" />
//                 </View>
//                 <Text style={styles.score}>You are the master</Text>
//                 <Text style={styles.score}>Congrats you scored {score}%</Text>
//             </View>);
//         }
//     }
//     render() {
//         return(
//             <View style={{flex:1}}>
//             <StatusBar barStyle="light-content"/>
//             <View style={styles.toolbar}>
//                 <TouchableOpacity></TouchableOpacity>

//             </View>

//             </View>
//         );
//     }
// }


import React, { Component } from 'react';
// import Quiz  from '../../components/quiz';
// import Quiz from './quiz';
import Quiz from './Quizlah';
import {
  StyleSheet,
  StatusBar,
  TouchableOpacity,
  View,
  Text
} from 'react-native';
import Icon from 'react-native-vector-icons/FontAwesome';
export default class Playquizme extends Component {
  constructor(props){
    super(props)
    this.state = {
      quizFinish : false,
      score: 0
    }
  }
  _onPressBack(){
    const {goBack} = this.props.navigation
      goBack()
  }
  _quizFinish(score){    
    this.setState({ quizFinish: true, score : score })
  }
  _scoreMessage(score){
    if(score <= 30){
      return (<View style={styles.innerContainer} >
                <View style={{ flexDirection: "row"}} >
                  <Icon name="trophy" size={30} color="white" />
                </View>
                <Text style={styles.score}>You need to work hard</Text>
                <Text style={styles.score}>You scored {score}%</Text>
              </View>)
    }else if(score > 30 && score < 60){
      return (<View style={styles.innerContainer} >
                  <View style={{ flexDirection: "row"}} >
                    <Icon name="trophy" size={30} color="white" />
                    <Icon name="trophy" size={30} color="white" />
                  </View>
                  <Text style={styles.score}>You are good</Text>
                  <Text style={styles.score}>Congrats you scored {score}% </Text>
                </View>)
    }else if(score >= 60){
      return (<View style={styles.innerContainer}>
                 <View style={{ flexDirection: "row"}} >
                     <Icon name="trophy" size={30} color="white" />
                     <Icon name="trophy" size={30} color="white" />
                     <Icon name="trophy" size={30} color="white" />
                  </View>
                  <Text style={styles.score}>You are the master</Text>
                  <Text style={styles.score}>Congrats you scored {score}% </Text>
                </View>)
    }
  }
  render() {
    return (
      <View style={{flex:1}}>
      <StatusBar barStyle="light-content"/>
      <View style={styles.toolbar}>
                    <TouchableOpacity onPress={() => this._onPressBack() }><Text style={styles.toolbarButton}>Back</Text></TouchableOpacity>
                    <Text style={styles.toolbarTitle}></Text>
                    <Text style={styles.toolbarButton}></Text>
      </View>

       { this.state.quizFinish ? <View style={styles.container}>
           <View style={styles.circle}>

             { this._scoreMessage(this.state.score) }
           </View>

       </View> :  <Quiz quizFinish={(score) => this._quizFinish(score)} /> }

      </View>
    );
  }
}
const scoreCircleSize = 300
const styles = StyleSheet.create({
  score: {
    color: "white",
    fontSize: 20,
    fontStyle: 'italic'
  },
  circle: {
    justifyContent: 'center',
    alignItems: 'center',
    width: scoreCircleSize,
    height: scoreCircleSize,
    borderRadius: scoreCircleSize/2,
    backgroundColor: "green"
  },
  innerContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
    // backgroundColor: 'red',
  },
  toolbar:{
        backgroundColor:'#81c04d',
        // paddingTop:30,
    paddingTop: 10,
        paddingBottom:10,
        flexDirection:'row'
    },
    toolbarButton:{
        width: 55,
        color:'#fff',
        // color:'red',
        textAlign:'center'
    },
    toolbarTitle:{
        color:'#fff',
        // color:'red',
        textAlign:'center',
        fontWeight:'bold',
        flex:1
    }
});